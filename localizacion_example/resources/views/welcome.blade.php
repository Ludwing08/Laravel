<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div style="display: flex; justify-content: space-between; margin: 5px">
        <a href="{{ route('example') }}"> Page 2</a>

        @include('_partials.switchLang')        
    </div>
    

    <p style="margin: 20px 5px"> {{ __('welcome.gretting') }} </p>

</body>
</html>