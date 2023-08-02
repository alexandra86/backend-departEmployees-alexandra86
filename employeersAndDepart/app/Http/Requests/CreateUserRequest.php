<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'firstName'=> ['required', 'string', 'min:3'],
            'lastName'=> ['required', 'string','min:3'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6'],
            'phone' => ['nullable', 'string'],
            'department_id'=>['nullable', 'string','exists: departments,id']
        ];
    }

    public function messages(): array{
        return [
            'firstName.required'=> 'O primeiro nome é obrigatório!',
            'firstName.string'=> 'O primeiro nome deve ser uma string!',
            'firstName.min'=> 'O primeiro nome conter no mínimo 3 caracteres!',
            'lastName.required'=> 'O último nome é obrigatório!',
            'lastName.string'=> 'O primeiro nome deve ser uma string!',
            'lastName.min'=> 'O primeiro nome conter no mínimo 3 caracteres!',
            'email.required'=> 'Email é obrigatório!',
            'email.email'=>'Email deve ser um endereço válido!',
            'password.required'=> 'Senha é obrigatória!',
            'password.min'=>'Senha deve ser conter no mínimo 6 caracteres!',
            'phone.string'=>'Telefone deve ser uma string!',
            'department_id.exists'=>'Departamento não encontrado!',
            'department_id.string'=>'Departamento deve ser uma string!'
        ];
    }
}
