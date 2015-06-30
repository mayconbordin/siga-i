<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarTurmaRequest extends Request {

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
			'nome'           => 'required|max:255',
			'data_inicio'    => 'required|date_format:d/m/Y|before_date:data_fim',
		    'data_fim'       => 'required|date_format:d/m/Y',
            'horario_inicio' => 'required|date_format:H:i:s',
            'horario_fim'    => 'required|date_format:H:i:s'
		];
	}

}
