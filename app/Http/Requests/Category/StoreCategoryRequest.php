<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|string|unique:categories,name'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'შეავსე სახელის ველი',
            'name.unique' => 'ასეთი კატეგორია უკვე არსებობს'
        ];
    }
}