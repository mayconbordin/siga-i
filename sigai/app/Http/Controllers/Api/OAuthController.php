<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Services\Contracts\UsuarioServiceContract;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

use \DB;
use \Lang;
use \Input;
use \Response;

class OAuthController extends Controller
{
    protected $service;

    public function __construct(UsuarioServiceContract $service)
    {
        $this->service = $service;
    }

    public function issueAccessToken()
    {
        return Response::json(Authorizer::issueAccessToken());
    }

    public function verifyAccessToken()
    {
        $accessToken = Input::get('token');

        try {
            $isValid = Authorizer::validateAccessToken(false, $accessToken);
            $user = $this->service->show(Authorizer::getResourceOwnerId());

            return $this->jsonResponse([
                'access_token' => $accessToken,
                'valid' => $isValid,
                'user' => $user,
                'scopes' => Authorizer::getScopes()
            ]);
        } catch (\Exception $e) {
            return $this->jsonResponse([
                'access_token' => $accessToken,
                'valid' => false,
            ]);
        }
    }
}
