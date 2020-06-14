@extends('default')
@section('titulo') Sexo @endsection
@section('contenido')
    <div class="uk-child-width-1-2@m uk-grid-match" uk-grid>
    @foreach($sexos as $sexo)
        <div>
            <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                <h3 class="uk-card-title">{{$sexo->sexo}}</h3>
                <a href="{{route('versexo', ['sexo'=>$sexo->id])}}">Ver</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
