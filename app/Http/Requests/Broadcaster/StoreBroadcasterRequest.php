<?php

namespace App\Http\Requests\Broadcaster;

use Illuminate\Foundation\Http\FormRequest;

class StoreBroadcasterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|unique:broadcasters,email'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => __('შეავსე სახელის ველი'),
            'email.required' => __('შეავსე Email ველი'),
            'email.unique' => __('ეს Email უკვე გამოყენებულია'),
        ];
    }
}
