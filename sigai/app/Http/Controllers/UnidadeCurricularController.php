<?php namespace App\Http\Controllers;

use App\Http\Requests\SalvarUnidadeCurricularRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use App\Services\Contracts\UnidadeCurricularServiceContract;
use \Lang;

class UnidadeCurricularController extends Controller
{
    protected $service;

    public function __construct(UnidadeCurricularServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function listar()
	{
        $ucs = $this->service->paginateWithTurmas();
	
		return view('unidades_curriculares.index', [
		    'unidadesCurriculares' => $ucs
		]);
	}
	
	public function mostrar($id)
	{
	    try {
	        $uc = $this->service->showFull($id);
	        
	        return view('unidades_curriculares.criar_mostrar', [
		        'uc' => $uc
		    ]);
        } catch(NotFoundError $e) {
            return redirect('unidades_curriculares')->with('error', $e->getMessage());
        }
	}
	
	public function criar()
	{
	    return view('unidades_curriculares.criar_mostrar');
	}
	
	public function editar(SalvarUnidadeCurricularRequest $request, $id)
	{
	    try {
	        $uc = $this->service->edit($request->all(), $id);
	    
	        return redirect()->action('UnidadeCurricularController@mostrar', [$uc->id])
	                         ->with('success', Lang::get('unidades_curriculares.create_success'));
        } catch(NotFoundError $e) {
            return redirect('unidades_curriculares')->with('error', $e->getMessage());
        } catch(ServerError $e) {
            return redirect()->action('UnidadeCurricularController@mostrar', [$id])
	                         ->with('error', $e->getMessage());
        }
	}
	
	public function salvar(SalvarUnidadeCurricularRequest $request)
	{
	    try {
	        $uc = $this->service->save($request->all());
	    
	        return redirect()->action('UnidadeCurricularController@mostrar', [$uc->id])
	                         ->with('success', Lang::get('unidades_curriculares.create_success'));
        } catch(ServerError $e) {
            return redirect('unidades_curriculares')->with('error', $e->getMessage());
        }
	}
	
}
