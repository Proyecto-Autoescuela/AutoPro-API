@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('content')

@php( $teachers = \App\Teacher::all())
@php( $students = \App\Student::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <form action="{{ action('StudentController@listByName') }}" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Introduce el alumno" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>


                    @foreach($students as $s)
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">{{$s->name}}</h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$s->email}}</p>
                                    @foreach($teachers as $t)
                                        <p class="text">Profesor: {{$t->name}}</p>
                                    @endforeach
                                    <p class="text">Licencia: {{$s->license}}</p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                    @endforeach
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('students') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection