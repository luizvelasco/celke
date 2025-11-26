<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

    </head>
    <body>
        <div>
            <h1>Listar os Usuários</h1>

            {{-- Imprimir os regitros --}}
            @forelse ($users as $user)
                ID: {{ $user->id }} <br>
                Nome: {{ $user->name }} <br>
                E-mail: {{ $user->email }} <hr>
            @empty
                <h3>Nenhum registro encontrado.</h3>
            @endforelse

        </div>
    </body>
</html>
