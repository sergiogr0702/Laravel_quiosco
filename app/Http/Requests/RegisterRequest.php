<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email|min:3|max:255',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()->numbers()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'name.max' => 'El nombre puede tener como máximo 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'email.unique' => 'El email ya está registrado.',
            'email.min' => 'El email debe tener al menos 3 caracteres.',
            'email.max' => 'El email puede tener como máximo 255 caracteres.',
            'password.required' => 'La contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden. ',
            'password' => 'La contraseña debe tener al menos 8 caracteres, una letra, un símbolo y un número.',
        ];
    }
}
