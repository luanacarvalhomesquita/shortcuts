<?php

namespace App\Http\Requests\Shortcut;

use Illuminate\Foundation\Http\FormRequest;

class ShareShortcutRequest extends FormRequest
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
            'hash' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'hash.required' => 'O hash é obrigatório.',
            'hash.string' => 'O hash deve ser uma string.',
        ];
    }
}
