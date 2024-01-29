<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1> {{ $user->name }}</h1>
    <h2> Phones </h2>
    @forelse ($user->phones as $phone)
        <h4> Number:  {{ '(+' . $phone->prefix . ')' . $phone->phone_number }} </h4>            
    @empty
        <h3>No data </h3>
    @endforelse
    <h2> Roles </h2>
    <h3>SIM Data</h3>
    @foreach ($user->phoneSim as $sim)
    {{ $sim->company }}
    @endforeach
    @forelse ($user->roles as $role)
        <h4> {{ $role->name }} </h4>
    @empty
        <h3> No data </h3>
    @endforelse
</body>

</html>
