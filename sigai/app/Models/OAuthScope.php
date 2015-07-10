<?php namespace App\Models;

use App\Transformers\Base\TransformableTrait;
use Illuminate\Database\Eloquent\Model;

class OAuthScope extends Model {
    use TransformableTrait;
    protected $transformer = 'App\Transformers\OAuthScopeTransformer';
    protected $table = 'oauth_scopes';
    public $incrementing = false;
    protected $fillable = ['id', 'description'];

    public function clients()
    {
        return $this->belongsToMany('App\Models\OAuthClient', 'oauth_client_scopes', 'scope_id', 'client_id');
    }
}