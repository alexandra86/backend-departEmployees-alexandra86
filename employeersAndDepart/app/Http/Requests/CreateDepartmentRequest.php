<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentRequest extends FormRequest
{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'name'=> ['required', 'string', 'min:3'],
        ];
    }

    public function messages(): array{
        return [
            'name.required'=> 'O nome do departamento é obrigatório!',
            'name.string'=> 'O nome da departamento deve ser uma string!',
            'name.min'=> 'O nome da departamento conter no mínimo 3 caracteres!',
        ];
    }
}