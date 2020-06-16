<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
</head>
    <body>
    @include('components.navbar')
        @yield('contenido')
    @include('components.footer')
    <script src="{{asset('js/materialize.min.js')}}"></script>
    @yield('extra-script')
    <script>
        var sidenavs = document.querySelectorAll('.sidenav')
        for (var i = 0; i < sidenavs.length; i++){
            M.Sidenav.init(sidenavs[i]);
        }
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
