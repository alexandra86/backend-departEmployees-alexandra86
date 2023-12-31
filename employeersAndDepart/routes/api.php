<?php

use App\Http\Controllers\{AuthController, UserController, DepartmentController, TaskController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'createUser']);
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users/{id}', [UserController::class, 'retrieveUser']);



Route::post('/departments', [DepartmentController::class, 'createDepartment']);
Route::get('/departments', [DepartmentController::class, 'listDepartments']);
Route::get('/departments/{id}', [DepartmentController::class, 'retrieveDepartment']);
Route::patch('/departments/{id}', [DepartmentController::class, 'updateDepartment']);
Route::delete('/departments/{id}', [DepartmentController::class, 'deleteDepartment']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('jwt.verify')->group(function(){

    Route::patch('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

    Route::post('/tasks', [TaskController::class, 'createTask']);
    Route::patch('/tasks/{id}', [TaskController::class, 'updateTask']);
    Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask']);
});

Route::get('/tasks', [TaskController::class, 'listTasks']);
Route::get('/tasks/{id}', [TaskController::class, 'retrieveTask']);