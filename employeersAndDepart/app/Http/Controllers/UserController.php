<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function createUser(Request $request){
        return User::create($request->all());
    }

    public function listUsers(){
        return User::all();
    }

    public function updateUser(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuário excluído com sucesso']);
    }
}