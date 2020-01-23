@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PANEL GENERAL</div>
                <div class="card-body">
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="ALUMNOS" onclick="location.href = '{{ route('students') }}'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block"value="PROFESOR" onclick="location.href = '{{ route('teachers') }}'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="ADMINS" {{--onclick="location.href = '{{ route('admins') }}'"--}}/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="TEMARIOS" {{--onclick="location.href = '{{ route('units') }}'"--}}/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="TESTS" {{--onclick="location.href = '{{ route('tests') }}'"--}}/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="RESERVAS" {{--onclick="location.href = '{{ route('reserves') }}'"--}}/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="OPCIONES" {{--onclick="location.href = '{{ route('options') }}'"--}}/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
