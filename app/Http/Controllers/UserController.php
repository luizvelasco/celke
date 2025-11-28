<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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

        // Capturar possíveis excessões durante a execução
        try {

            // Cadastrar no banco de dados na tabela usuários
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Redirecionar o usuário 
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');

        } catch (Exception $e){
            
            // Redirecionar o usuário e enviar msg de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado');

        }
    }

    // Carregar o formulário editar usuário
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Editar no banco de dados o usuário
    public function update(Request $request, User $user)
    {

        // Capturar possíveis excessões durante a execução
        try {

            // Editar as informações do registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Redirecionar o usuário 
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso!');
        
        } catch (Exception $e){
            
            // Redirecionar o usuário e enviar msg de erro
            return back()->withInput()->with('error', 'Usuário não atualizado');

        }
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

         // Capturar possíveis excessões durante a execução
        try {

            // Editar as informações do registro no banco de dados
            $user->update([
                'password' => $request->password,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Senha do usuário editado com sucesso!');

        } catch (Exception $e){
            
            // Redirecionar o usuário e enviar msg de erro
            return back()->withInput()->with('error', 'Senha não atualizada');

        }
        
    }

    // Apagar o usuário
    public function destroy(User $user)
    {

         // Capturar possíveis excessões durante a execução
        try {
            // Excluir o registro do banco de dados
            $user->delete();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.index')->with('success', 'Usuário apagado com sucesso!');

        } catch (Exception $e){
            
            // Redirecionar o usuário e enviar msg de erro
            return back()->withInput()->with('error', 'Usuário não apagado');

        }
    }
}
