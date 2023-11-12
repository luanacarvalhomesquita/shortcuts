<?php

namespace App\Http\Requests\Shortcut;

use App\Models\Shortcut;
use Illuminate\Foundation\Http\FormRequest;

class CreateShortcutRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:50',
            'note' => 'nullable|string|max:2000',
            'link' => 'required|url',
            'color' => ['nullable', 'regex:/^#?([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];

        if (empty($this->input('color'))) {
            $this->merge(['color' => Shortcut::DEFAULT_COLOR]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string.',
            'title.max' => 'O título não pode ter mais de 50 caracteres.',

            'note.string' => 'A nota deve ser uma string.',
            'note.max' => 'A nota não pode ter mais de 2000 caracteres.',

            'link.required' => 'O link é obrigatório.',
            'link.url' => 'O link deve ser uma URL válida. Ex.: https://www.google.com',

            'color.regex' => 'A cor deve estar no formato hexadecimal válido (#RRGGBB). Ex.: #FFFFFF',
        ];
    }
}
