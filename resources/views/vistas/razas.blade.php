@extends('default')
@section('titulo') Raza @endsection
@section('contenido')
    <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
        @foreach($razas as $raza)
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title">{{$raza->raza}}</h3>
                    <a href="{{route('verraza', ['raza'=>$raza->id])}}">Ver</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
