<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {
        // Recuperar os registros do banco de dados
        $users = User::orderBy('id', 'DESC')->get();

        return view('users.index', ['users' => $users]);
    }

    // Visualizar o usuário
    public function show(User $user)
    {
        
        return view('users.show', ['user' => $user]);
    }

    // Carregar o formulário cadastrar usuário
    public function create()
    {
        return view('users.create');
    }

    // Cadastrar no banco de dados o novo usuário
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirecionar o usuário 
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Carregar o formulário editar usuário
    public function edit()
    {
        return view('users.edit');
    }

    // Apagar o usuário
    public function destroy()
    {
        dd('Apagar o usuário');
    }
}
