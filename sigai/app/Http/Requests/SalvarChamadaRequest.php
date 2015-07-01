<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarChamadaRequest extends Request {

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
			'device_id' => 'required',
			'card_id'   => 'required',
            'timestamp' => 'date_format:Y-m-d H:i:s'
		];
	}

}
