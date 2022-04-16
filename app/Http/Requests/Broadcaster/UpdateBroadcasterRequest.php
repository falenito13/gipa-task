<?php

namespace App\Http\Requests\Broadcaster;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBroadcasterRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
            'email' => 'required|unique:broadcasters,email,' . $this->id
        ];
    }

    public function messages() : array
    {
        return (array) ((object) new StoreBroadcasterRequest)->messages();
    }
}
