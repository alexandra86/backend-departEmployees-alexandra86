<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateTaskRequest;
use App\Services\CreateTaskService;

class DepartmentController extends Controller {
    public function createDepartment(CreateTaskRequest $request){
        $createTaskService = new CreateTaskService();
        return $createTaskService->execute($request->all());
    }
}