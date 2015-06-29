<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use \Lang;
use \Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	
	
	protected $redirectPath = '/';

	/**
	 * Create a new authentication controller instance.
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email'    => 'required',
			'password' => 'required',
		]);
		
		$credentials = $request->only('email', 'password');
        $otherCredentials = ['matricula' => $request->email, 'password' => $request->password];
		
		if (Auth::attempt($credentials, $request->has('remember')) || Auth::attempt($otherCredentials, $request->has('remember')))
        {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Logged in.']);
            }

            return redirect()->intended($this->redirectPath());
		}

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['email' => $this->getFailedLoginMessage()]);
        } else {
            return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        }
	}

    public function getRegister()
    {
        return redirect('/');
    }
     
    public function postRegister()
    {
        return redirect('/');
    }
    
    protected function getFailedLoginMessage()
	{
		return Lang::get('login.failed');
	}
}
