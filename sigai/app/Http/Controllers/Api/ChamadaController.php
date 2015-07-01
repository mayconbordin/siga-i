<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\SalvarChamadaRequest;
use App\Services\Contracts\ChamadaServiceContract;

use \DB;
use \Lang;
use \Input;

class ChamadaController extends Controller
{
    protected $service;

    public function __construct(ChamadaServiceContract $service)
    {
        $this->service = $service;
    }

	public function salvar(SalvarChamadaRequest $request)
	{
        $isOk = $this->service->saveSingleChamada($request->all());

        if ($isOk === false) {
            return response()->json([
                'errors' => [Lang::get('chamadas.cant_save')]
            ], 400);
        }

        return $this->jsonResponse([
            'message' => Lang::get('chamadas.saved')
        ]);
	}
}
