<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarUnidadeCurricularRequest extends Request {

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
			'nome'          => 'required|max:255',
			'sigla'         => 'required|max:5',
			'carga_horaria' => 'required|integer',
			'unidade_curricular_id' => 'integer'
		];
	}

}
