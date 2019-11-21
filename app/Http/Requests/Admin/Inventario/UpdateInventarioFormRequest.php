<?php

namespace App\Http\Requests\Admin\Inventario;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarioFormRequest extends FormRequest
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
            'portaria'=> 'bail|required',
            'data_inicio'=> 'bail|required|date',
            'duracao'=> 'bail|required|numeric',
            'obs'=> 'bail|nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'ano.date_format:"Y"' => 'O campo :attribute está em formato invalido',
            'data_inicio.date' => 'O campo :attribute está em formato de data invalido',
            'duracao.numeric' => 'O campo :atribute deve representa, por numero inteiro, a duração em dias corridos para 
                calculo da data final do inventario',
        ];
    }
}
