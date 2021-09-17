@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-danger mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-2">Editar Receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action=" {{ route('recetas.update', ['receta' => $receta->id]) }}" novalidate enctype="multipart/form-data" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"
                        placeholder="Titulo de la receta"
                        class="form-control  @error('titulo') is-invalid @enderror"
                        value="{{  $receta->titulo }}" />

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    {{-- Crear un select --}}
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control  @error('categoria') is-invalid @enderror"
                        value="{{ old('categoria') }}" />
                    >
                    <option value="">--Seleccione---</option>

                    @foreach ($categorias as $c)

                        <option
                            value="{{ $c->id }}"
                            {{ $receta->categoria_id == $c->id ? 'selected' : '' }}
                        >
                            {{ $c->nombre }}
                        </option>

                    @endforeach

                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparacion</label>

                    <input
                        id="preparacion"
                        type="hidden"
                        name="preparacion"
                        value="{{ $receta->preparacion }}">

                    <trix-editor
                        input="preparacion"
                        class="@error('preparacion') is-invalid @enderror"
                    ></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>

                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{ $receta->ingredientes }}">

                    <trix-editor
                        input="ingredientes"
                        class="@error('ingredientes') is-invalid @enderror"
                    ></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>

                <div  class="form-group mt-3">
                    <label for="imagen">Elige una imagen</label>

                    <input
                        type="file"
                        name="imagen"
                        id="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
                    >
                    <div class="mt-4 w-100">
                        <p>Imagen Acutal</p>
                        <img src="/storage/{{$receta->imagen}}" alt="{{$receta->titulo}}" style="width: 300px">
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-outline-danger">
                </div>


            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js" integrity="sha512-H8CbNdhcOBCt62S6eVGAUSiyNx5OGVEVrYIIVs0iIgurgD1+oTA9THTZ1tqxSE9yw9vzfilg83xgyxD467a28g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
