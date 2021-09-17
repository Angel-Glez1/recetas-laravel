@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form class="container h-100" method="GET" action="{{ route('buscar.search') }}"  >
            @csrf
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra una receta para tu proxima comida</p>
                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar Receta"
                    >
                </div>

            </div>
        </form>
    </div>
@endsection

@section('content')

    {{--* Ultimas recetas  --}}
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Ultimas Recetas</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nueva)
                <div class="card item">
                    <img src="/storage/{{$nueva->imagen}}" alt="" class="card-img-top">
                    <div class="card-body h-100">
                        <h3>{{$nueva->titulo}}</h3>
                        <p> {{ Str::words( strip_tags($nueva->preparacion), 20) }} </p>
                        <a class="btn btn-danger d-block font-weight-bold text-capitalize" href="{{ route('recetas.show', ['receta' => $nueva->id]) }}">Ver receta</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--Recetas con mas likes  --}}
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas con más votos</h2>
            <div class="row">
                @foreach ($votadas as $rc)
                    @include('ui.receta')
                @endforeach
        </div>
    </div>


    {{-- Retas por categoria --}}
    @foreach ($recetas as $key => $group)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-', ' ',$key) }}</h2>
            <div class="row">
                @foreach ($group as $recetasCat)
                    @foreach ($recetasCat as $rc)
                        @include('ui.receta')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach




@endsection
