<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'createUser']);
Route::get('/users', [UserController::class, 'listUsers']);
Route::patch('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);


Route::post('/departments', [DepartmentController::class, 'createDepartment']);
Route::get('/departments', [DepartmentController::class, 'listDepartments']);
Route::patch('/departments/{id}', [DepartmentController::class, 'updateDepartment']);
Route::delete('/departments/{id}', [DepartmentController::class, 'deleteDepartment']);