<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'id' => 'required|exists:products,id',
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'product_price' => 'required',
            'file_id' => 'required|integer|exists:files,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Produto não encontrado.',
            'id.exists' => 'Não é possivel alterar o produto selecionado, motivo: produto não cadastrado.',
            'product_name.required' => 'O nome do produto é obrigatório.',
            'product_name.max' => 'O nome do produto deve ter no máximo 255 caracteres.',
            'category_id.required' => 'A categoria do produto é obrigatória.',
            'category_id.exists' => 'Categoria inexistente, verifique se a categoria informada foi cadastrada e tente novamente.',
            'product_price.required' => 'O preço do produto é obrigatório.',
            'product_price.numeric' => 'O preço do produto deve ser um número.',
            'file_id.required' => 'A imagem do produto é obrigatória.',
            'file_id.exists' => 'Imagem inválida.',
        ];
    }
}
