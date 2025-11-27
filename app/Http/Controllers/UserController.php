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
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Editar no banco de dados o usuário
    public function update(Request $request, User $user)
    {
        // Editar as informações do registro no banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Redirecionar o usuário 
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso!');
    }

    // Carregar o formulário editar senha do usuário
    public function editPassword(User $user)
    {
        // Carregar a view 
        return view('users.edit-password', ['user' => $user]);
    }

    // Editar no banco de dados a senha do usuário
    public function updatePassword(Request $request, User $user)
    {
        // Editar as informações do registro no banco de dados
        $user->update([
            'password' => $request->password,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Senha do usuário editado com sucesso!');
    }

    // Apagar o usuário
    public function destroy(User $user)
    {
        // Excluir o registro do banco de dados
        $user->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'Senha do usuário editado com sucesso!');
    }
}
