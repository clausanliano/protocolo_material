<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'serial' =>  'string|nullable',
            'tombo' =>  'string|nullable',
            'observacao' =>  'string|nullable',
            'modelo_id' =>  'required|numeric',
        ];
    }
}
