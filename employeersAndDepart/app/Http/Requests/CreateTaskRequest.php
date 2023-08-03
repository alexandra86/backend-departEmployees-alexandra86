<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'title'=> ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string'],
            'assignee_id' => ['nullable','exists: users,id'],
            'due_date' => ['nullable', 'datetime']
        ];
    }

    public function messages(): array{
        return [
            'title.required'=> 'O título da tarefa é obrigatório!',
            'title.string'=> 'O título da tarefa deve ser uma string!',
            'title.min'=> 'O título da tarefa deve conter no mínimo 3 caracteres!',
            'description.string'=> 'A descrição da tarefa deve ser uma string!',
            'due_date.datetime'=> 'O prazo limite da tarefa deve conter uma data válida!'
        ];
    }
}