<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Department;

class CreateDepartmentService {
    public function execute(array $data){
        $departmentFound = Department::firstWhere('name', $data['name']);

        if(!is_null($departmentFound)){
            throw new AppError('Departamento já existente!', 409);
        }

        return Department::create($data);
    }
}