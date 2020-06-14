<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
</head>
<body>
@include('components.navbar')
   <div class="uk-container">
       <h1>@yield('titulo')</h1>

       @yield('contenido')
   </div>
@include('components.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>

<script src="{{asset('js/materialize.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.tabs').tabs();
    });
</script>

</body>
</html>
