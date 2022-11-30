<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModeloRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:2',
            'observacao' => 'string|nullable',
            'tipo_material_id' => 'numeric|required',
            'fabricante_id' => 'numeric|required',
        ];
    }
}
