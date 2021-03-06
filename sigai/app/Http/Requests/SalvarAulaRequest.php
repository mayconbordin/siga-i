<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarAulaRequest extends Request {

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
			'data'               => 'required|date_format:d/m/Y',
			'status'             => 'integer',
			'conteudo'           => 'string',
			'turma_id'           => 'integer',
			'ensino_a_distancia' => 'boolean',
			'obs'                => 'string',
            'horario_inicio'     => 'required|date_format:H:i:s',
            'horario_fim'        => 'required|date_format:H:i:s',
            'ambiente_id'        => 'integer|exists:ambientes,id',
            'professor_id'       => 'required|integer|exists:professores,id'
		];
	}

}
