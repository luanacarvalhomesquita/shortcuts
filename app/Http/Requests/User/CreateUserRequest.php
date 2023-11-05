<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:2',
            'email' => 'required|email|max:255|min:5|unique:users,email',
            'password' => ['required', 'string', 'confirmed', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode exceder 100 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Credenciais inválidas.',
            'email.max' => 'O campo email não pode exceder 255 caracteres.',
            'email.unique' => 'Credenciais inválidas.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra e um número.',
            'password.confirmed' => 'As senhas não coincidem.',
        ];
    }
}
