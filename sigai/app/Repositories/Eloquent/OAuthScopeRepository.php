<?php namespace App\Repositories\Eloquent;

use App\Models\Ambiente;
use App\Models\OAuthScope;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Repositories\Contracts\OAuthScopeRepositoryContract;
use \DB;
use \Lang;
use \Log;

class OAuthScopeRepository extends BaseRepository implements OAuthScopeRepositoryContract
{
    public function findById($id)
    {
        $scope = OAuthScope::where('id', $id)->first();
	    
	    if ($scope == null) {
	        throw new NotFoundError(Lang::get('scopes.not_found'));
	    }

	    return $scope;
    }
    
    public function listAll()
    {
        $scopes = OAuthScope::all();
        return $scopes;
    }
    
    public function paginate($orderBy = 'id', $perPage = 10)
    {
        $scopes = OAuthScope::orderBy($orderBy)->paginate($perPage);
	    return $scopes;
    }

    public function update(array $data, $id)
    {
        $scope = self::findById($id);

        $scope->description = array_get($data, 'description', $scope->description);

        if (!$scope->save()) {
            throw new ServerError(Lang::get('scopes.save_error'));
        }

        return $scope;
    }
    
    public function insert(array $data)
    {
        $scope = new OAuthScope;

        $scope->id          = array_get($data, 'id');
        $scope->description = array_get($data, 'description');

	    if (!$scope->save()) {
            throw new ServerError(Lang::get('scopes.create_error'));
        }

        return $scope;
    }
    
    public function deleteById($id)
    {
        $scope = self::findById($id);

        if ($scope == null) {
            throw new NotFoundError(Lang::get('scopes.not_found'));
        }

        DB::beginTransaction();

        try {
            $scope->clients()->detach();
            $scope->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage(), ['trace' => $e->getTrace(), 'exception' => $e]);
            throw new ServerError(Lang::get('scopes.remove_error'), $e->getCode(), $e);
        }

        DB::commit();
    }
}
