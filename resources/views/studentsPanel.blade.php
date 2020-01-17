@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ALUMNOS</div>
                <div class="card-body">
                    <input type="button" class="btn btn-light btn-lg btn-block" value="BUSCAR" onclick="location.href = '{{ route('search') }}'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="AÑADIR" onclick="location.href = '{{ route('home') }}'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="MODIFICAR" onclick="location.href = '{{ route('home') }}'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ELIMINAR" onclick="location.href = '{{ route('home') }}'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="OPCIONES" onclick="location.href = '{{ route('home') }}'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('home') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection