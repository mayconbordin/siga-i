<?php namespace App\Http\Controllers;

use App\Repositories\ProfessorRepository;
use App\Repositories\AulaRepository;
use App\Repositories\DiarioRepository;

use \Auth;

use Carbon\Carbon;

class IndexController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		//$this->middleware('permissions');
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
	    $professor = ProfessorRepository::findByIdWith(Auth::user()->id, ['turmas']);
	    $nextAulas = AulaRepository::findNextByProfessor($professor->id);
	    $diarios   = DiarioRepository::findDiariosToClose($professor->id);
	    
	    $daysEndMonth = Carbon::now()->diffInDays(Carbon::now()->endOfMonth());
	    

	    return view('home.professor', [
	        'professor' => $professor,
	        'turmas'    => $professor->turmas,
	        'nextAulas' => $nextAulas,
	        'diarios'   => $diarios,
	        'daysEndMonth' => $daysEndMonth
	    ]);
	}

}
