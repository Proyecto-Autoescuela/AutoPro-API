@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('content')

@php( $teachers = \App\Teacher::all())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <form action="{{ action('TeacherController@listByName') }}" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce el profesor" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                    @if(isset($teacher))
                        @foreach($teacher as $response)
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">{{$response->id}}. {{$response->name}}</h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$response->email}}</p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        @endforeach
                    @else
                        @foreach($teachers as $t)
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">{{$t->id}}. {{$t->name}}</h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$t->email}}</p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        @endforeach
                    @endif
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('teachers') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection