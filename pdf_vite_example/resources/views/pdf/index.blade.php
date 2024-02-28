<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF DOM</title>
    <style>
        li{
            list-style: none,            
        }
        body{
            color: blue
        }

    </style>

</head>
<body>
     <h1> Reporte </h1>
     <ul>
     @forelse ($data as $d)
        <li> Name:   {{ $d['name'] }} Age:  {{  $d['edad'] }} </li>
     @empty
         <h1> No data </h1>
     @endforelse
    </ul>
</body>
</html>