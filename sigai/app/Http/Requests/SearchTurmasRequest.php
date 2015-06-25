<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchTurmasRequest  extends Request {

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
            'limit'  => 'integer',
            'sort'   => 'string|in:id,nome,data_inicio,data_fim,unidade_curricular',
            'order'  => 'string|in:asc,desc',
            'search' => 'string',
            'field'  => 'string|in:nome,data_inicio,data_fim,unidade_curricular,professores'
        ];
    }

}