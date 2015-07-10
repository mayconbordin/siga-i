<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class OAuthClient extends Model {
    use TransformableTrait;

    const STATUS_OK          = 'OK';
    const STATUS_UNKNOWN     = 'NA';
    const STATUS_OFFLINE     = 'OFF';

    protected $transformer = 'App\Transformers\OAuthClientTransformer';
    protected $table = 'oauth_clients';
    public $incrementing = false;
    protected $fillable = ['id', 'secret', 'name'];

    public function ambientes()
    {
        return $this->belongsToMany('App\Models\Ambiente', 'dispositivos_ambiente', 'oauth_client_id', 'ambiente_id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoDispositivo', 'tipo_dispositivo_id');
    }

    public function heartbeats()
    {
        return $this->hasMany('App\Models\HeartbeatDispositivo', 'oauth_client_id');
    }

    public function scopes()
    {
        return $this->belongsToMany('App\Models\OAuthScope', 'oauth_client_scopes', 'client_id', 'scope_id');
    }
}