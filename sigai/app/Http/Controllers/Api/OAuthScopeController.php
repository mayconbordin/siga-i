<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarOAuthScopeRequest;
use App\Http\Requests\SearchOAuthScopesRequest;
use App\Http\Requests\UpdateOAuthScopeRequest;

use App\Services\Contracts\OAuthScopeServiceContract;
use \DB;
use \Lang;
use \Input;

class OAuthScopeController extends Controller
{
    protected $service;

    public function __construct(OAuthScopeServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar()
	{
        $cursos = $this->service->listAll();
		return $this->jsonResponse($cursos);
	}
}
