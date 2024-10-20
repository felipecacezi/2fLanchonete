<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'order.order_client_register' => 'required',
            'order.order_client_name' => 'required|string',
            'order.order_payment_method' => 'required|string|in:D,C,P',
            'order.order_zipcode' => 'required|string|min:8',
            'order.order_street' => 'required|string',
            'order.order_number' => 'required|string',
            'order.order_district' => 'required|string',
            'order.order_address_reference' => 'nullable|string',
            'order.order_city' => 'required|string',
            'order.order_state' => 'required|string|size:2',
            'order.order_whatsapp' => 'required|string',
            'products' => 'required|array|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'order.order_client_register|required' => 'O campo Cpf deve ser preenchido.',
            'order.order_client_name|required' => 'O campo Nome deve ser preenchido.',
            'order.order_client_name|string' => 'O campo Nome não foi preenchido corretamente.',
            'order.order_payment_method|required' => 'O campo Forma de Pagamento deve ser preenchido.',
            'order.order_payment_method|string' => 'O campo Forma de Pagamento não foi preenchido corretamente.',
            'order.order_payment_method|in' => 'O campo Forma de Pagamento não foi preenchido corretamente.',
            'order.order_zipcode|required' => 'O campo Cep deve ser preenchido.',
            'order.order_zipcode|string' => 'O campo Cep não foi preenchido corretamente.',
            'order.order_zipcode|min' => 'O campo Cep não foi preenchido corretamente.',
            'order.order_street|required' => 'O campo Rua deve ser preenchido.',
            'order.order_street|string' => 'O campo Rua não foi preenchido corretamente.',
            'order.order_number|required' => 'O campo Número deve ser preenchido.',
            'order.order_number|string' => 'O campo Número não foi preenchido corretamente.',
            'order.order_district|required' => 'O campo Bairro deve ser preenchido.',
            'order.order_district|string' => 'O campo Bairro não foi preenchido corretamente.',
            'order.order_city|required' => 'O campo Cidade deve ser preenchido.',
            'order.order_city|string' => 'O campo Cidade não foi preenchido corretamente.',
            'order.order_state|required' => 'O campo Estado deve ser preenchido.',
            'order.order_state|string' => 'O campo Estado não foi preenchido corretamente.',
            'order.order_state|size' => 'O campo Estado não foi preenchido corretamente.',
            'order.order_whatsapp|required' => 'O campo Whatsapp deve ser preenchido.',
            'order.order_whatsapp|string' => 'O campo Whatsapp não foi preenchido corretamente.',
            'products.required' => 'Deve ser selecionado pelo menos um item para realizar o pedido.',
            'products.min' => 'Deve ser selecionado pelo menos um item para realizar o pedido.',
        ];
    }
}
