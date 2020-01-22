@extends('layouts.app')

@section('content')
@php( $teachers = \App\Teacher::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MODIFICAR</div>
                <div class="card-body">
                    <form method="POST" action="enviar">
                        <div class="form-group mb-2">
                          <p>Nombre: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group mb-2">
                          <p>Correo: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="email" class="form-control" placeholder="Correo">
                        </div>
                        <div class="form-group mb-2">
                            <p>Contraseña: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="email" class="form-control" placeholder="Contraseña">
                        </div>
                        <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="MODIFICAR"/>
                    </form>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('students') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection