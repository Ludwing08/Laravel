<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controlador</title>
</head>

<body>
    <a href=" {{ route('user.create') }}"> <button> Crear </button> </a>
    <h1>Lista de Usuarios</h1>
    <table border="1">
        @forelse ($users as $user)
            <tr>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->age }} </td>
                <td> {{ $user->address }} </td>
            </tr>
        @empty
            <h3>Lista vacía</h3>
        @endforelse

    </table>

</body>

</html>
