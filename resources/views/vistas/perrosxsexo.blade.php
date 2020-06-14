@extends('default')
@section('titulo') Información {{$nombre_sexo}} @endsection
@section('contenido')
    <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
        @foreach($perritos as $perrito)
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title">{{$perrito->nombre }} - {{$perrito->getRaza->raza}}</h3>
                    Raza : {{$perrito->getRaza->raza}} <br>
                    Sexo {{$perrito->getSexo->sexo}} <br>
                    Nombre {{$perrito->nombre}} <br>
                    Tamano {{$perrito->getTamano->tamano}} <br>
                    Fecha Nacimiento {{$perrito->fecha_nacimiento}} <br>
                    Señas Particulares {{$perrito->senas_particulares?$perrito->senas_particulares: "No hay"}} <br>

                </div>
            </div>
        @endforeach
    </div>
@endsection
