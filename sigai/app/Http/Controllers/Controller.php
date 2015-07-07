<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

abstract class Controller extends BaseController {

	use DispatchesJobs, ValidatesRequests;
	
	protected $transformOptions;

	protected function jsonResponse($data, $options = array(), $code = 200)
	{
	    $result = null;
	    $this->transformOptions = $options;
	    
	    if ($data instanceof Collection || $data instanceof EloquentCollection) {
	        $data = $data->all();
	    }

	    if (is_array($data)) {
	        $result = array_map([$this, 'transformObject'], $data);
	    } else {
	        $result = $this->transformObject($data);
	    }
	    
	    return response()->json($result);
	}
	
	protected function transformObject($object)
	{
	    if (is_object($object) && in_array('App\Transformers\Base\TransformableTrait', class_uses($object))) {
	        return $object->transform($this->transformOptions);
	    } else {
	        return $object;
	    }
	}

}
