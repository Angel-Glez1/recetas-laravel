@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="titulo-categoria text-uppercase ">Resultados de : <b>{{$busqueda}}</b></h2>
    </div>

    <div class="row">
        @foreach ($recetas as $rc)
            @include('ui.receta')
        @endforeach
    </div>

    <div class="d-flex justify-content-center align-items-center mt-4">
        {{ $recetas->links() }}
    </div>

@endsection
