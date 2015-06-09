<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

use \Auth;

class SalvarUsuarioRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nome'     => 'required|max:255',
			'email'    => 'required|email|max:255|unique:usuarios,email,' . Auth::user()->id,
			'password' => 'string|required|min:3',
			
			'new_password'              => 'string|min:3|confirmed',
			'new_password_confirmation' => 'string|min:3'
		];
	}

}
