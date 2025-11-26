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
    public function show()
    {
        return view('users.show');
    }

    // Carregar o formulário cadastrar usuário
    public function create()
    {
        return view('users.create');
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
