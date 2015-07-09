<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarOAuthClientRequest extends Request {

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
            'id'                  => 'required|max:40|unique:oauth_clients',
            'secret'              => 'required|max:40',
			'name'                => 'required|max:255',
			'tipo_dispositivo_id' => 'required|exists:tipos_dispositivos,id',
            'ambiente_id'         => 'integer|exists:ambientes,id'
		];
	}

}
