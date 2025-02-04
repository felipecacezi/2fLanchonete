<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'order_status' => 'required|string|in:A,R,C,I,F,D,E',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O id do pedido é obrigatório.',
            'order_status.required' => 'O status do pedido é obrigatório.',
            'order_status.in' => 'O status do pedido é inválido.',
        ];
    }
}
