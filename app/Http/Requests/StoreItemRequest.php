<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'material_id'  =>  'required|integer',
            'observacao'  =>  'string|nullable',
        ];
    }
}
