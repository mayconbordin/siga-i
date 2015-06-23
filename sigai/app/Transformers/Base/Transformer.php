<?php namespace App\Transformers\Base;

abstract class Transformer {
	/**
	 * @var mixed
	 */
	protected $entity;
	
	/**
	 * @param $entity
	 */
	function __construct($entity)
	{
		$this->entity = $entity;
	}
	
	/**
	 * Allow for property-style retrieval
	 *
	 * @param $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (method_exists($this, $property)) {
			return $this->{$property}();
		}
		return $this->entity->{$property};
	}
	
	/**
	 * Transforms the object into an array of key/value pairs
	 *
	 * @return array
	 */
	public abstract function transform($options = array());

    protected function getSubOptions($key, array $options)
    {
        $subOptions = [];

        foreach ($options as $opt) {
            $pos = stripos($opt, $key.'.');

            if ($pos !== false && $pos === 0) {
                $subOptions[] = str_replace($key.'.', '', $opt);
            }
        }

        return $subOptions;
    }
} 
