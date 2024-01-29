<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <script src="https://kit.fontawesome.com/cf707e7028.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @yield('style')

</head>
<body>
    @include('layouts._partials.nav')
    @include('layouts._partials.banner')
    @yield('content')
</body>
</html>