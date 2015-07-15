<?php namespace App\Repositories\Test;


use App\Exceptions\NotFoundError;
use App\Exceptions\RepositoryException;
use App\Exceptions\ValidationError;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;
use Illuminate\Foundation\Application;

use \DB;
use \Lang;

abstract class BaseRepository implements BaseRepositoryContract {
    /**
     * The Eloquent Model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    private $model;

    /**
     * The validator factory instance.
     *
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    /**
     * @var Application
     */
    private $application;

    /**
     * The models for with.
     *
     */
    protected $with = array();

    protected $defaultLimit = 15;

    /**
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;

        $this->makeModel();
        $this->makeValidator();
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    protected function makeModel()
    {
        $model = $this->application->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    protected function makeValidator()
    {
        $this->validator = $this->application->make('validator');
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws ValidationError
     */
    public function create(array $attributes)
    {
        $validator = $this->validate($attributes);

        if ($validator->fails()) {
            throw ValidationError::fromValidator($validator);
        }

        $model = $this->model->newInstance($attributes);
        $model->save();

        $this->resetModel();

        return $this->parserResult($model);
    }

    public function update(array $attributes, $id)
    {
        $validator = $this->validate($attributes);

        if ($validator->fails()) {
            throw ValidationError::fromValidator($validator);
        }

        $model = $this->find($id);
        $model->fill($attributes);
        $model->save();

        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        $model = $this->model->all($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    public function exists($id)
    {
        $model = DB::table($this->model->getTable())->where($this->model->getKeyName(), $id)->first();
        $this->resetModel();
        return !is_null($model);
    }

    /**
     * Find data by id
     * @param $id
     * @param array $columns
     * @return Model
     * @throws NotFoundError
     */
    public function find($id, $columns = array('*'))
    {
        $model = $this->model->find($id, $columns);

        if ($model == null) {
            throw new NotFoundError($this->getMessage('not_found'));
        }

        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * Find data by field and value
     *
     * @param string $field
     * @param mixed  $value
     * @param string $operator
     * @param array  $columns
     * @return mixed
     */
    public function findByField($field, $value = null, $operator = '=', $columns = array('*'))
    {
        $model = $this->model->where($field, $operator, $value)->first($columns);
        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = array('*'))
    {
        $model = $this->createQuery($where)->first($columns);
        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * Find data by field and value
     *
     * @param string $field
     * @param mixed $value
     * @param string $operator
     * @param array $columns
     * @return mixed
     */
    public function findAllByField($field, $value = null, $operator = '=', $columns = array('*'))
    {
        $model = $this->model->where($field, $operator, $value)->get($columns);
        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findAllWhere(array $where , $columns = array('*'))
    {
        $model = $this->createQuery($where)->get($columns);
        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * Retrieve all data of repository, paginated
     * @param int   $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = 15, $columns = array('*'))
    {
        $results = $this->model->paginate($limit, $columns);
        $this->resetModel();
        return $this->parserResult($results);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return call_user_func_array([$this->model, 'count'], []);
    }

    public function delete($id)
    {
        $model = $this->find($id);
        return $model->delete();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function destroy(array $ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * @param $observer
     * @return mixed
     */
    public function observe($observer)
    {
        return call_user_func_array([$this->model, 'observe'], [$observer]);
    }

    /**
     * Load relations
     *
     * @param array|string $relations
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    public function orderBy($field, $order = 'asc')
    {
        $this->model = $this->model->orderBy($field, $order);
        return $this;
    }

    /**
     * @param null $query
     * @return array
     */
    public function rules($query = null)
    {
        $model = $this->model;

        // get rules from the model if set
        if (isset($model::$rules)) {
            $rules = $model::$rules;
        } else {
            $rules = [];
        }

        if(empty($rules) || !is_array($rules)) {
            return [];
        }

        // if the query is empty
        if (!$query) {
            // return all of the rules
            // array filter clears empty, null, false values
            return array_filter($rules);
        }

        // return the relevant rules
        return array_filter(array_only($rules, $query));
    }

    /**
     * @param array $data
     * @param null $rules
     * @param bool $custom
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $data, $rules = null, $custom = false)
    {
        if (!$custom) {
            $rules = $this->rules($rules);
        }

        return $this->validator->make($data, $rules);
    }

    public function parserResult($result)
    {
        return $result;
    }

    /**
     * @return string
     */
    public abstract function model();

    /**
     * @return string
     */
    public abstract function name();

    public function resetModel()
    {
        $this->makeModel();
    }

    protected function getMessage($key)
    {
        return Lang::get('repository.'.$key, ['entity' => $this->name()]);
    }


    /**
     * Get a new query that searches by attributes.
     *
     * @param  array  $where
     * @param  string $operator   Default: '='
     *
     * @return Builder
     */
    public function createQuery(array $where, $orderBy = [], $limit = null, $operator = '=')
    {
        $query = $this->model->newQuery();

        foreach ($where as $field => $value) {
            if (is_array($value) && sizeof($value) == 3) {
                list($field, $condition, $val) = $value;

                if ($condition == 'in') {
                    $query->whereIn($field, $val);
                } else {
                    $query->where($field, $condition, $val);
                }
            } else if (is_array($value) && sizeof($value) == 4) {
                list($operator, $field, $condition, $val) = $value;

                if ($operator == 'or') {
                    $query->orWhere($field, $condition, $val);
                } else if ($operator == 'and') {
                    $query->where($field, $condition, $val);
                }
            } else {
                $query->where($field, $operator, $value);
            }
        }

        foreach ($orderBy as $value) {
            list($field, $order) = $value;
            $query->orderBy($field, $order);
        }

        if ($limit != null) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * Builds a query based on field names, operators and parameters.
     *
     * @param array $fields     A list of field names.
     * @param array $operators  A list of operators ('and' or 'or').
     * @param array $parameters A list of values to match the field names.
     * @param string $operator  The operator to be used.
     * @return Builder
     * @throws RepositoryException
     */
    protected function buildQuery(array $fields, array $operators, array $parameters, $operator = '=')
    {
        /*if (sizeof($fields) != sizeof($parameters)) {
            throw new RepositoryException("Number of parameters must match that of fields.");
        }*/
        $where   = [];
        $orderBy = [];
        $limit   = null;

        for ($i=0; $i<sizeof($operators); $i++) {
            if (in_array($operators[$i], ['and', 'or'])) {
                $where[] = [$operators[$i], $fields[$i], $operator, $parameters[$i]];
            } else if (in_array($operators[$i], ['in'])) {
                $where[] = [$fields[$i], $operators[$i], $parameters[$i]];
            } else if (in_array($operators[$i], ['orderby'])) {
                $order = (isset($parameters[$i]) ? $parameters[$i] : 'asc');
                $orderBy[] = [$fields[$i], $order];
            } else if (in_array($operators[$i], ['limit'])) {
                $limit = isset($parameters[$i]) ? $parameters[$i] : $this->defaultLimit;
            }
        }

        return $this->createQuery($where, $orderBy, $limit);

    }

    /**
     * Handle dynamic method calls into the method.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     * @throws RepositoryException
     */
    public function __call($method, $parameters)
    {
        if (!preg_match('/^(find)(AllBy|By)?(.*)(Limit|OrderBy)?$/i', $method, $matches)) {
            throw new RepositoryException("Method name $method is not valid");
        }

        preg_match_all('/(Limit|OrderBy|And|Or|In)+/', $matches[3], $parts);

        $hasLimit = array_search('Limit', $parts[0]);
        $partsSize = ($hasLimit === false) ? sizeof($parts[0]) : (sizeof($parts[0]) - 1);

        $action = $matches[1] . $matches[2];
        $fields = $this->parseFields($matches[3]);

        $operators = array_map('strtolower', ((sizeof($fields) > $partsSize) ? array_merge(['And'], $parts[0]) : $parts[0]));

        //$operators = array_map('strtolower', array_merge(['And'], $parts[0])/*(sizeof($fields) > sizeof($parts[0])) ? array_merge(['And'], $parts[0]) : $parts[0]*/);
        //dd($action, $fields, $operators, $parameters, $matches);

        switch ($action) {
            case 'findAllBy':
                $query = $this->buildQuery($fields, $operators, $parameters);
                $this->resetModel();
                return $this->parserResult($query->get());
            case 'findBy':
                $query = $this->buildQuery($fields, $operators, $parameters);
                $this->resetModel();
                return $this->parserResult($query->first());
            default:
                throw new RepositoryException("Method name $method is not valid.");
        }
    }

    protected function parseFields($fieldsStr)
    {
        $items = preg_split('/(Limit|OrderBy|And|Or|In)/', $fieldsStr);

        $fields = array_filter(array_map(function($item) {
            return strtolower(trim(preg_replace("/(Limit|OrderBy|And|Or|In)+/", "", preg_replace("/[A-Z]/", "_$0", $item)), '_'));
        }, $items), function($item) {
            return ($item != null && strlen($item) > 0);
        });

        return array_merge([], $fields);
    }
}