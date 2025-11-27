@extends('layouts.admin')

@section('content')

    <div>
        <h2>Editar Usuário</h2>

        <a href="{{ route('users.index') }}">Listar</a><br><br>
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br><br>

        <x-alert />

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" placeholder="Nome do usuário" value="{{ old('name', $user->name) }}" required><br><br>

            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" placeholder="E-mail do usuário" value="{{ old('email', $user->email) }}" required><br><br>

            <button type="submit">Editar</button>

        </form>

    </div>

@endsection

