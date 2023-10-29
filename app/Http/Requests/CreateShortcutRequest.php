<?php

namespace App\Http\Requests;

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
            'note' => 'required|string|max:2000',
            'link' => 'nullable|url',
            'color' => ['nullable', 'regex:/^#?([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];

        // Aplicar valor padrão se o campo 'color' estiver vazio
        if (empty($this->input('color'))) {
            $this->merge(['color' => '#FFFFFF']); // Define o valor padrão como #FFFFFF (branco)
        }

        return $rules;
    }
}
