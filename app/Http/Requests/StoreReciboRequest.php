<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReciboRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recebedor_id'  =>  'required|integer',
            'observacao'  =>  'string|nullable',
        ];
    }
}
