<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class PermissionTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'name'         => $this->name,
            'display_name' => $this->display_name,
            'description'  => $this->description
        ];
        
        return $data;
    }
}
