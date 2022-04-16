<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products,name',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'შეავსე სახელის ველი',
            'name.unique' => 'პროდუქტი ასეთი სახელით არსებობს',
            'price.required' => 'შეავსე ფასის ველი',
            'price.numeric' => 'ფასი უნდა იყოს მთელი ან წილადი',
            'quantity.required' => 'შეავსე რაოდენობის ველი',
            'quantity.integer' => 'რაოდენობა უნდა იყოს რიცხვი',
            'categories.required' => 'აირჩიე მინიმუმ 1 კატეგორია'
        ];
    }
}
