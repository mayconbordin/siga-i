<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\Base\TransformableTrait;

class OAuthClient extends Model {
    protected $table = 'oauth_clients';
    protected $fillable = ['id', 'secret', 'name'];

    public function ambientes()
    {
        return $this->belongsToMany('App\Models\Ambiente', 'dispositivos_ambiente', 'oauth_client_id', 'ambiente_id');
    }
}