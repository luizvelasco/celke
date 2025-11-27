@extends('layouts.admin')

@section('content')
    <div>
        <h2>Listar os Usuários</h2>

        <a href="{{ route('users.create') }}">Cadastrar</a><br><br>

        <x-alert />

        {{-- Imprimir os regitros --}}
        @forelse ($users as $user)
            ID: {{ $user->id }} <br>
            Nome: {{ $user->name }} <br>
            E-mail: {{ $user->email }} <br>
            <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br>
            <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a>
            <hr>
        @empty
            <h3>Nenhum registro encontrado.</h3>
        @endforelse

    </div>
@endsection

