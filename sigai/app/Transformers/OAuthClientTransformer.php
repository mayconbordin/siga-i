<?php namespace App\Transformers;

use App\Models\OAuthClient;
use App\Transformers\Base\Transformer;

use \Lang;

class OAuthClientTransformer extends Transformer
{
    public function transform($options = array())
    {
        $data = [
            'id'                  => $this->id,
            'name'                => $this->name,
            'secret'              => $this->secret,
            'tipo_dispositivo_id' => (int) $this->tipo_dispositivo_id,
            'status'              => isset($this->status) ? $this->status : OAuthClient::STATUS_UNKNOWN
        ];
 
        if (in_array('tipo', $options)) {
            $data['tipo'] = $this->tipo->transform();
        }

        if (in_array('ambientes', $options)) {
            $opts = $this->getSubOptions('ambientes', $options);

            $data['ambientes'] = array_map(function($e) use ($opts) {
                return $e->transform($opts);
            }, $this->ambientes->all());
        }

        if (in_array('scopes', $options)) {
            $opts = $this->getSubOptions('scopes', $options);

            $data['scopes'] = array_map(function($e) use ($opts) {
                return $e->transform($opts);
            }, $this->scopes->all());
        }
        
        return $data;
    }
}
