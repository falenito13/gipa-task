<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products,name,' . $this->id,
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id'
        ];
    }

    public function messages() : array
    {
        return (array) ((object) new StoreProductRequest())->messages();
    }
}
