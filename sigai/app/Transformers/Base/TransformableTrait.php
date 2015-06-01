<?php namespace App\Transformers\Base;

use App\Transformers\Base\TransformerException;

trait TransformableTrait {
	/**
	 * Transformer instance
	 *
	 * @var mixed
	 */
	protected $transformerInstance;
	
	/**
	 * Prepare a new or cached transformer instance
	 *
	 * @return mixed
	 * @throws TransformerException
	 */
	public function transform($options = array())
	{
		if (!$this->transformer or ! class_exists($this->transformer)) {
			throw new TransformerException('Please set the $transformer property to your transformer path.');
		}
		
		if (!$this->transformerInstance) {
			$this->transformerInstance = new $this->transformer($this);
		}
		
		return $this->transformerInstance->transform($options);
	}
} 
