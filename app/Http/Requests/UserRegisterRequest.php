<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'max:20', Password::min(6)->letters()->mixedCase()->numbers()->symbols()],
            'passwordConfirmation' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'O nome deve conter ao menos 03 caracteres.',
            'name.max' => 'O nome deve conter no máximo 50 caracteres.',
            'email.required' => 'O endereço de e-mail é obrigatório.',
            'email.unique' => 'Este endereço de e-mail já está sendo utilizado.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve conter no mínimo 06 caracteres.',
            'password.max' => 'A senha deve conter no máximo 20 caracteres.',
            'password.numbers' => 'A senha deve conter ao menos 01 número.',
            'password.letters' => 'A senha deve conter ao menos 01 letra.',
            'password.symbols' => 'A senha deve conter ao menos 01 caracter especial.',
            'password.mixed' => 'A senha deve conter ao menos 01 letra maiúscula e 01 letra minúscula.',
            'passwordConfirmation.same' => 'A confirmação de senha está incorreta.',
            'passwordConfirmation.required' => 'A confirmação de senha é obrigatória.',
        ];
    }
}
