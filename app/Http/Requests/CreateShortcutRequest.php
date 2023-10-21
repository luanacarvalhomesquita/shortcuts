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
        return [
            'title' => 'required|string|max:50',
            'note' => 'required|string|max:2000',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048', // Exemplo: aceitar apenas imagens JPEG, PNG e GIF com até 2MB.
        ];
    }
}
