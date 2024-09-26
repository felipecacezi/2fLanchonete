<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'menuconf_title' => 'required|max:255',
            'menuconf_description' => 'required',
            'menuconf_open' => 'required',
            'menuconf_close' => 'required',
            'menuconf_contactphone' => 'required',
            'menuconf_whatsappnumber' => 'required',
            'menuconf_zipcode' => 'required',
            'menuconf_street' => 'required',
            'menuconf_district' => 'required',
            'menuconf_city' => 'required',
            'menuconf_state' => 'required',
            'menuconf_number' => 'required',
            'file_id' => 'required',
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
            'menuconf_title.required' => 'O titulo é obrigatório',
            'menuconf_title.max' => 'O titulo não pode ter mais de 255 caracteres',
            'menuconf_open.required' => 'O horário de abertura é obrigatório',
            'menuconf_close.required' => 'O horário de fechamento é obrigatório',
            'menuconf_contactphone' => 'O telefone de contato é obrigatório',
            'menuconf_whatsappnumber' => 'O número de whatsapp é obrigatório',
            'menuconf_zipcode' => 'O CEP é obrigatório',
            'menuconf_street' => 'A rua é obrigatória',
            'menuconf_district' => 'O bairro é obrigatório',
            'menuconf_city' => 'A cidade é obrigatória',
            'menuconf_state' => 'O estado é obrigatório',
            'menuconf_number' => 'O numero é obrigatório',
            'file_id.required' => 'O banner do restaurante é obrigatório',
        ];
    }
}
