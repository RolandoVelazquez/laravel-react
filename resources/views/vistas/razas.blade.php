@extends('default')
@section('nav-content')
    <div class="nav-content">
        <ul class="tabs tabs-transparent">
            @foreach($razas as $raza)
                <li class="tab"><a href="#tab{{$raza->id}}">{{$raza->raza}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
@section('titulo') Raza @endsection
@section('contenido')
    <div id="ContentRazas"></div>
@endsection
@section('extra-script')
    <script>
        var tabs = document.querySelectorAll('.tabs')
        for (var i = 0; i < tabs.length; i++) {
            M.Tabs.init(tabs[i]);
        }


    </script>
@endsection
