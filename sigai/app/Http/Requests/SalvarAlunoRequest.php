<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarAlunoRequest extends Request {

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
			'matricula'    => 'required|max:30|unique:usuarios',
			'nome'         => 'required|max:255',
			'email'        => 'required|email|max:255|unique:usuarios',
			'password'     => 'required|string'
		];
	}

}
