<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenteRequest extends FormRequest
{
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
            'nome'           => 'required',
            'dataNascimento' => 'date',
            'telefone'       => 'required',
            'endereco'       => 'required',
            'cidade_id'      => 'required',
            'socio_id'       => 'required',

        ];
    }
}
