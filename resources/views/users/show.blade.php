@extends('layouts.admin')

@section('content')

    <h2>Detalhes do usuário</h2>
    <a href="{{ route('users.index') }}">Listar</a><br><br>

    <x-alert/>

    {{-- Imprimir os detalhes do registro --}}
    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
    Atualizado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>

@endsection

