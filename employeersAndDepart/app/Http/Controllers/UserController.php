<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CreateUserService;
use App\Services\UserAuthorizationService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function createUser(Request $request){
        $createUserService = new CreateUserService();
        $userData = $request->all();
        $user = $createUserService->execute($userData);
        $user->department_id = $userData['department_id'];
        $user->save();
        return $user;

    }

    public function listUsers(){
        return User::with('department')->get();
    }

    public function retrieveUser($id){
        $user = User::with('department')->findOrFail($id);
        return $user;
    }

    public function updateUser(Request $request, $id){
        $userAuthorizationService = app(UserAuthorizationService::class);
        $user = User::findOrFail($id);
        $userAuthorizationService->checkAuthorization($user);
        $user->update($request->all());
        return $user;
    }

    public function deleteUser($id){
        $userAuthorizationService = app(UserAuthorizationService::class);
        $user = User::findOrFail($id);
        $userAuthorizationService->checkAuthorization($user);
        $user->delete();
        return response()->json(['message' => 'Usuário excluído com sucesso']);
    }
}