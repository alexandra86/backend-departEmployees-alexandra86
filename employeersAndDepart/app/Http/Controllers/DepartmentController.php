<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Models\Department;
use App\Services\CreateDepartmentService;

class DepartmentController extends Controller {
    public function createDepartment(CreateDepartmentRequest $request){
        $createDepartmentService = new CreateDepartmentService();
        return $createDepartmentService->execute($request->all());
    }

    public function listDepartments(){
        return Department::all();
    }
}