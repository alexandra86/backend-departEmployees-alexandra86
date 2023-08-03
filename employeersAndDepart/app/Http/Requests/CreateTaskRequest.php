<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

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
            'due_date' => ['nullable', 'string'],

            
        ];
    }

    public function messages(): array{
        return [
            'title.required'=> 'O título da tarefa é obrigatório!',
            'title.string'=> 'O título da tarefa deve ser uma string!',
            'title.min'=> 'O título da tarefa deve conter no mínimo 3 caracteres!',
            'description.string'=> 'A descrição da tarefa deve ser uma string!',
            'due_date.string' => 'O prazo limite da tarefa deve estar no formato de data válido (DD/MM/YYYY)!',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('due_date')) {
            $this->merge([
                'due_date' => Carbon::createFromFormat('d/m/Y', $this->due_date)->format('Y-m-d'),
            ]);
        }
    }
}