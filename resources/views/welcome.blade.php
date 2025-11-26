@extends('layouts.admin')

@section('content')
    Bem-vindo!<br><br>

    <a href="{{ route('users.index') }}">Usuários</a><br><br>
@endsection