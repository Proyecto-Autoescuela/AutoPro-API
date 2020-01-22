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
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Introduce el profesor" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                    </div>
                    @foreach($teachers as $t)
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">{{$t->name}}</h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text">{{$t->email}}</p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                    @endforeach
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('teachers') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection