<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Models\Department;
use App\Services\CreateDepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller {
    public function createDepartment(CreateDepartmentRequest $request){
        $createDepartmentService = new CreateDepartmentService();
        return $createDepartmentService->execute($request->all());
    }

    public function listDepartments(){
        return Department::all();
    }

    public function retrieveDepartment($id) {
        $department = Department::findOrFail($id);
        return $department;
    }

    public function updateDepartment(Request $request, $id){
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return $department;
    }

    public function deleteDepartment($id){
        $department = Department::findOrFail($id);
        $department->delete();
        return response()->json(['message' => 'Departamento excluído com sucesso']);
    }
}