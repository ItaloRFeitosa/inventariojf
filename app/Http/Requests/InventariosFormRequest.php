<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventariosFormRequest extends FormRequest
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
            'name'=> 'bail|required',
            'ano'=> 'bail|required|date_format:"Y"',
            //'localidade'=> 'bail|string',
            'portaria'=> 'bail|required',
            'data_inicio'=> 'bail|required|date',
            'duracao'=> 'bail|required|numeric',
            'obs'=> 'bail',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'date' => 'O campo :attribute está em formato de data invalido',
            'ano.date_format:"Y"' => 'O campo :attribute está em formato invalido',
            'duracao.numeric' => 'O campo :atribute deve representa a duração em dias corridos por numero inteiro',
        ];
    }
}
