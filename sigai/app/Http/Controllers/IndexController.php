<?php namespace App\Http\Controllers;

use App\Services\Contracts\ProfessorServiceContract;
use \Auth;

use Carbon\Carbon;

class IndexController extends Controller
{
    protected $professorService;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ProfessorServiceContract $professorService)
	{
		$this->middleware('auth');
		//$this->middleware('permissions');

        $this->professorService = $professorService;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::user()->hasRole('coordenador')) {
		    //return $this->professorHome();
		}
		
		if (Auth::user()->hasRole('professor')) {
		    return $this->professorHome();
		}
		
		return view('index');
	}
	
	protected function professorHome()
	{
        $data = $this->professorService->showSummary(Auth::user()->id);
	    

	    return view('home.professor', [
	        'professor' => $data['professor'],
	        'turmas'    => $data['turmas'],
	        'nextAulas' => $data['nextAulas'],
	        'diarios'   => $data['diarios'],
	        'daysEndMonth' => $data['daysEndMonth']
	    ]);
	}

}
