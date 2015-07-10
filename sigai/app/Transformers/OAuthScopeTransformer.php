<?php namespace App\Transformers;

use App\Models\OAuthClient;
use App\Transformers\Base\Transformer;

use \Lang;

class OAuthScopeTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'          => $this->id,
            'description' => $this->description
        ];
        
        return $data;
    }
}
