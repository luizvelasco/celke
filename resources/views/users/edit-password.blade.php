@extends('layouts.admin')

@section('content')
    <div>
        <h2>Editar a Senha</h2>

        <a href="{{ route('users.index') }}">Listar</a><br>
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br><br>

        <x-alert />

        <form action="{{ route('users.update.password', ['user' => $user->id ]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="password">Senha: </label>
            <input type="password" name="password" id="password" placeholder="Senha do usuário" required><br><br>

            <button type="submit">Editar</button>

        </form>
    </div>
@endsection