<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DigitoVerificadorRut;

class UsuariosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rut'=> ['bail','required','unique:usuarios,rut,NULL,id,deleted_at,NULL','regex:/^(\d{7,8}-[\dkK])$/',new DigitoVerificadorRut],
        ];
    }

    public function messages(){
        return[
            'rut.unique'=>'Usuario ya existe',
            'rut.required'=>'Se necesita rut',
            'rut.regex'=>'Indique RUT sin puntos, con guión y con digito verificador',
        ];
    }
}
