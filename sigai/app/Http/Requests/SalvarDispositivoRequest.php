<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarDispositivoRequest extends Request {

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
            'codigo'              => 'required|max:255|unique:dispositivos',
			'tipo_dispositivo_id' => 'required|exists:tipos_dispositivos,id',
            'usuario_id'          => 'required|integer|exists:usuarios,id'
		];
	}

}
