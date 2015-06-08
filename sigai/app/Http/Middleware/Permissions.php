<?php namespace App\Http\Middleware;

use App\Repositories\TurmaRepository;

use Closure;
use \Auth;

class Permissions {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user  = Auth::user();
		$route = $request->route();
		
		$permissions = $this->getPermissions($request);
		$roles       = $this->getRoles($request);

		foreach ($permissions as $permission) {
		    if (strpos($permission, 'own') !== false) {
		        if ($user->can($permission) && $this->hasOwnership($permission, $user, $route)) {
		            return $this->response($request, $next, true);
		        }
		    } else if ($user->can($permission)) {
		        return $this->response($request, $next, true);
		    }
		}

		foreach ($roles as $role) {
		    if ($user->hasRole($role)) {
		        return $this->response($request, $next, true);
	        }
		}
		
		if (sizeof($roles) == 0 && sizeof($permissions) == 0) {
		    return $this->response($request, $next, true);
		}

		return $this->response($request, $next);
	}
	
	private function response($request, $next, $authorized = false)
	{
	    if (!$authorized) {
		    if ($request->ajax()) {
			    return response()->json(['errors' => ['Unauthorized.']], 401);
		    } else {
			    return view('errors.403');
		    }
        }
        
        return $next($request);
	}
	
	private function hasOwnership($permission, $user, $route)
	{
	    switch ($permission)
	    {
	        case 'edit-own-turma':
	            return TurmaRepository::hasProfessor($route->getParameter("turmaId"), $user->id);
	            break;
	            
            case 'view-own-turma':
	            return TurmaRepository::hasProfessor($route->getParameter("turmaId"), $user->id);
	            break;
	            
            case 'view-own-aula':
	            return TurmaRepository::hasProfessor($route->getParameter("turmaId"), $user->id) 
	                or TurmaRepository::hasAluno($route->getParameter("turmaId"), $user->id);
	            break;
	            
            case 'edit-own-aula':
	            return TurmaRepository::hasProfessor($route->getParameter("turmaId"), $user->id);
	            break;
	            
            case 'create-own-aula':
	            return TurmaRepository::hasProfessor($route->getParameter("turmaId"), $user->id);
	            break;
	    }
	    
	    
	    return false;
	}

    /**
     * Grab the permissions from the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    private function getPermissions($request)
    {
        $actions = $request->route()->getAction();
 
        if (!isset($actions['permissions'])) {
            return [];
        } else {
            return is_array($actions['permissions']) ? $actions['permissions'] : [$actions['permissions']];
        }
    }
    
    /**
     * Grab the enabled roles from the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    private function getRoles($request)
    {
        $actions = $request->route()->getAction();
        
        if (!isset($actions['roles'])) {
            return [];
        } else {
            return is_array($actions['roles']) ? $actions['roles'] : [$actions['roles']];
        }
    }
}
