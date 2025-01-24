<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_name' => 'required|string|unique:categories,category_name|max:255',
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
            'category_name.id' => 'Categoria inválida, a categoria pode ter sido deletada, verifique e tente novamente.',
            'category_name.required' => 'O nome da categoria é obrigatório.',
            'category_name.unique' => 'A categoria informada já foi cadastrada.',
            'category_name.max' => 'O nome da categoria deve ter no maximo 255 caracteres.',
            'category_name.string' => 'O nome da categoria deve ser um texto.',
        ];
    }
}
