<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Aluno;

class SalvarAlunoTurmaRequest extends Request {

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
			'status' => 'required|max:30|in:'. implode(',', [
                    Aluno::STATUS_NORMAL, Aluno::STATUS_CANCELADO, Aluno::STATUS_DISPENSADO, Aluno::STATUS_ENSINO_DISTANCIA,
                    Aluno::STATUS_TRANCAMENTO_MATRICULA, Aluno::STATUS_TRANSFERIDO
            ]),
			'curso_origem_id' => 'required|integer|exists:cursos,id'
		];
	}

}
