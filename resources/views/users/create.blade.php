@extends('layouts.admin')

@section('content')
    <div>
        <h2>Cadastrar Usuário</h2>

        <a href="{{ route('users.index') }}">Listar</a><br><br>

        <x-alert />

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('POST')

            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome do usuário" value="{{ old('name') }}" ><br><br>

            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" placeholder="E-mail do usuário" value="{{ old('email') }}"><br><br>

            <label for="password">Senha: </label>
            <input type="password" name="password" id="password" placeholder="Senha do usuário" value="{{ old('password') }}" ><br><br>

             <label for="password_confirmation">Confirmar a Senha: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirmar a senha" ><br><br>


            <button type="submit">Enviar</button>

        </form>

    </div>
@endsection