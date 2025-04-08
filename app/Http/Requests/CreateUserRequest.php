<?php

namespace App\Http\Requests;

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
            'name' => 'required', 
            'username' => 'required', 
            'email' => 'email|required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {   
        return [
            'name' => 'Nome não pode ser vazio!', 
            'username' => 'Username não pode ser vazio!', 
            'email' => 'Email Invalido!',
            'password' => 'Senhas Invalidas!'
        ];

    }
}
