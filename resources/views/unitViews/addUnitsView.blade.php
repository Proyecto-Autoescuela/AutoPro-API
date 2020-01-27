@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AÑADIR</div>
                <div class="card-body">
                     <form method="POST" action="{{ action('UnitController@addUnit') }}" role="form">
                        <div class="form-group mb-2">
                          <p>Titulo: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" placeholder="Titulo" name="name" required>
                        </div>
                        <div class="form-group mb-2">
                          <p>Imagen: </p>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile02">
                              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <button class="input-group-text" id="">Upload</button>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <p>Texto: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <textarea placeholder="Texto tema..." class="form-control" id="exampleFormControlTextarea1" name="conten_unit"></textarea>
                        </div>     
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input style="margin-top: 1rem" type="submit" class="btn btn-light btn-lg btn-block" value="AÑADIR" />
                    </form>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '{{ route('units') }}'"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection