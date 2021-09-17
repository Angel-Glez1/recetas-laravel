@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-outline-danger">Volver</a>
@endsection

@section('content')

    <article class="receta__content bg-white p-3 shadow" >
        <h1 class="text-center mb-4" > {{ $receta->titulo }}  </h3>

        <div class="receta__img">
            <img src="/storage/{{$receta->imagen}}" alt="{{ $receta->titulo }} imagen" class="w-100">
        </div>

        <div class="receta__meta">
            <p class="mt-1">
                <span class="font-weight-bold text-primary"> Escrito en:</span>
                <a class="text-dark" href="{{route('categorias.show', ['categoriaReceta' => $receta->categoria->id ])}}">
                    {{ $receta->categoria->nombre }}
                </a>
            </p>

            <p class="mt-1">
                <span class="font-weight-bold text-primary"> Autor:</span>
                <a class="text-dark" href="{{ route('perfil.show', ['perfil' => $receta->user->id]) }}">
                    {{ $receta->user->name }}
                </a>
            </p>

            <p class="mt-1">
                <span class="font-weight-bold text-primary"> Fecha:</span>
                @php
                    $fecha = $receta->created_at;
                @endphp
                <fecha-receta fecha="{{$fecha}}" ></fecha-receta>
            </p>


            <div class="receta__ingredientes">
                <h2 class="py-2 text-danger">Ingredientes</h2>
                {{-- TODO: Imprimir codigo HTML --}}
                {!! $receta->ingredientes  !!}
            </div>

            <div class="receta__preparacion">
                <h2 class="py-2 text-danger">Preparacion</h2>
                {{-- TODO: Imprimir codigo HTML --}}
                {!! $receta->preparacion  !!}
            </div>


            <div class="justify-content-center row text-center">
                <like-button
                    receta-id="{{$receta->id}}"
                    like="{{$like}}"
                    likes="{{$likes}}"
                >
                </like-button>
            </div>

        </div>
    </article>
@endsection
