<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalvarRoleRequest extends Request {

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
            'name'         => 'required|string|max:255|unique:roles',
            'display_name' => 'string|max:255',
			'description'  => 'string|max:255',
            'permissions'  => ''
		];
	}

}
