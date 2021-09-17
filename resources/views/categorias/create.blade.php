@extends('layouts.app')




@section('content')
    <div class="container">
        <h1>Subir clientes</h1>
        <form action="{{ route('clientes.store') }}" enctype="multipart/form-data" method="POST" >
            @csrf

            <input
                        type="file"
                        name="fclientes"
                        id="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
            >
            <input type="submit" value="Subir recetas" class="btn btn-danger mt-4"/>

        </form>
    </div>

@endsection
