<?php namespace App\Http\Controllers;

use App\Repositories\UnidadeCurricularRepository;
use App\Http\Requests\SalvarUnidadeCurricularRequest;

use App\Exceptions\NotFoundError;
use App\Exceptions\ServerError;

use \Lang;

class UnidadeCurricularController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function listar()
	{
        $ucs = UnidadeCurricularRepository::paginateWith(['turmas']);
	
		return view('unidades_curriculares.index', [
		    'unidadesCurriculares' => $ucs
		]);
	}
	
	public function mostrar($id)
	{
	    try {
	        $uc = UnidadeCurricularRepository::findByIdWith($id, ['turmas', 'cursos']);
	        
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
	        $uc = UnidadeCurricularRepository::update($request->all(), $id);
	    
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
	        $uc = UnidadeCurricularRepository::insert($request->all());
	    
	        return redirect()->action('UnidadeCurricularController@mostrar', [$uc->id])
	                         ->with('success', Lang::get('unidades_curriculares.create_success'));
        } catch(ServerError $e) {
            return redirect('unidades_curriculares')->with('error', $e->getMessage());
        }
	}
	
}
