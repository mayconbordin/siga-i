<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class HeartbeatDispositivo extends Model {
    /*use TransformableTrait;

    protected $transformer = 'App\Transformers\TipoDispositivoTransformer';*/
    protected $table = 'heartbeats_dispositivo';

    public function dispositivo()
    {
        return $this->belongsTo('App\Models\OAuthClient', 'oauth_client_id');
    }
}