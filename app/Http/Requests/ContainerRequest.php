<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContainerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client' => 'required',
            'number' => 'required',
            'type' => 'required',
            'status' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client.required' => 'O cliente é obrigatório.',
            'number.required' => 'O numero é obrigatório.',
            'type.required' => 'O tipo é obrigatório.',
            'status.required' => 'O status é obrigatório.',
            'category.required' => 'A categoria é obrigatória.',
        ];
    }
}
