<?php

namespace App\Http\Requests\Admin\Inventario;

use Illuminate\Foundation\Http\FormRequest;

class InventarioFormRequest extends FormRequest
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
            'ano' => 'required',
            'localidade' => 'required',
            'portaria' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'criado_por' => 'required',
            'obs' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'ano.*' => 'Ano corrente do Inventário é obrigatório!',
            'localidade.*' => 'Localidade do Inventário é obrigatório!',
            'portaria.*' => 'Portaria do Inventário é obrigatório!',
            'data_inicio.*' => 'Data de Inicio do Inventário é obrigatório!',
            'data_fim.required' => 'Data de Finalização do Inventário é obrigatório!',
            'data_fim.after' => 'Data de Finalização do Inventário deve ser após a data de início!',
            'criado_por.*' => 'Criador do Inventário é obrigatório!',
            'obs.*' => 'Localidade do Inventário é obrigatório!',
        ];
    }
}
