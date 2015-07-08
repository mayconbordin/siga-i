<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarAmbienteRequest extends Request {

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
			'nome'             => 'required|max:255',
			'tipo_ambiente_id' => 'required|exists:tipos_ambiente,id'
		];
	}

}
