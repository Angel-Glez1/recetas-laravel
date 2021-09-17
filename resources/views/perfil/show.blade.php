@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                    <img src="/storage/{{ $perfil->imagen }}" alt="{{ $perfil->user->name }}" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-md-7">
                <h2 class="text-center mb2 text-danger text-capitalize"> {{ $perfil->user->name }} </h2>
                <a href="{{ $perfil->user->url }}">Visitar Sitio Web</a>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>

        {{-- Mostar las recetas --}}
        <h2 class="text-center my-5">Recetas creadas por {{ $perfil->user->name }}</h2>
        <div class="container">
            <div class="row mx-auto bg-white p-4">
                @if (count($recetas) > 0)
                    @foreach ($recetas as $receta)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="/storage/{{ $receta->imagen }}" alt="{{ $receta->titulo }}"
                                    class="card-img-top">

                                <div class="card-body">
                                    <h3 class="text-center mt-1">{{ $receta->titulo }}</h3>
                                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}"
                                        class="btn btn-danger d-block mt-4 text-uppercase font-weight-bold">
                                        Ver Receta
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                @else
                    <p class="text-center w-100">No tiene recetas aun</p>
                @endif
            </div>
        </div>
        <div class="justify-content-center d-flex">
            {{$recetas->links()}}
        </div>
    </div>

@endsection
