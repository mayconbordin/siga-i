<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class HeartbeatDispositivo extends Model {
    use TransformableTrait;

    protected $transformer = 'App\Transformers\HeartbeatDispositivoTransformer';
    protected $table = 'heartbeats_dispositivo';
    protected $fillable = ['oauth_client_id', 'created_at', 'updated_at'];

    public function dispositivo()
    {
        return $this->belongsTo('App\Models\OAuthClient', 'oauth_client_id');
    }
}