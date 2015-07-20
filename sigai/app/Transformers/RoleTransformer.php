<?php namespace App\Transformers;

use App\Transformers\Base\Transformer;

use \Lang;

class RoleTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'           => (int) $this->id,
            'name'         => $this->name,
            'display_name' => $this->display_name,
            'description'  => $this->description
        ];

        if (in_array('permissions', $options)) {
            $opts = $this->getSubOptions('permissions', $options);

            $data['permissions'] = array_map(function($e) use ($opts) {
                return $e->transform($opts);
            }, $this->perms->all());
        }
        
        return $data;
    }
}
