<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProductRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:products,id',
        ];
    }
}
