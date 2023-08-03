<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Task;

class CreateTaskService {
    public function execute(array $data){
        $taskFound = Task::firstWhere('title', $data['title']);

        if(!is_null($taskFound)){
            throw new AppError('Tarefa já existente!', 409);
        }

        return Task::create($data);
    }
}