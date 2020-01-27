@extends('layouts.app')

{{-- @section('styles')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection --}}

@section('content')

@php( $units = \App\Unit::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <form action="{{ action('UnitController@listByID') }}" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce número del tema que quieres encontrar" name="id" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                    @if(isset($unit))
                        @foreach($unit as $response)
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">Tema {{$response->id}}: {{$response->name}}<img style="max-width: 20%" 
                                        src="https://www.guiadelnino.com/var/guiadelnino.com/storage/images/educacion/dibujar-con-los-ninos/16-dibujos-de-coches-para-colorear/un-coche-de-policia/3324992-5-esl-ES/un-coche-de-policia_w1140.jpg"/></h3>
                                    {{-- <p class="text">{{$response->unit_url}}</p> --}}
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$response->content_unit}}</p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        @endforeach
                    @else
                        @foreach($units as $u)
                        <button style="margin-bottom: 1rem">
                            <div class="card mygrid">
                                <h3 class="name">Tema {{$u->id}}: {{$u->name}}<img style="max-width: 20%" 
                                    src="https://www.guiadelnino.com/var/guiadelnino.com/storage/images/educacion/dibujar-con-los-ninos/16-dibujos-de-coches-para-colorear/un-coche-de-policia/3324992-5-esl-ES/un-coche-de-policia_w1140.jpg"/></h3>
                                {{-- <p class="text">{{$response->unit_url}}</p> --}}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$u->content_unit}}</p>
                                </blockquote>
                            </div>
                        </button>
                        @endforeach
                    @endif
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('units') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection