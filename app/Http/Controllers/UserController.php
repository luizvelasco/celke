<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {
        //dd('Carregar os usuários');

        return view('users.index');
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
