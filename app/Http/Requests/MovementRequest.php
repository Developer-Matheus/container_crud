<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovementRequest extends FormRequest
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
            'container' => 'required',
            'start_at' => 'required',
            'end_at' => 'required|after_or_equal:start_at',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'container.required' => 'O Container é obrigatório.',
            'type.required' => 'O Tipo de Mov. é obrigatório.',
            'start_at.required' => 'O inicio é obrigatório.',
            'end_at.required' => 'O fim é obrigatório.',
            'end_at.after_or_equal' => 'O fim deve ser maior ou igual ao incio.',
        ];
    }
}
