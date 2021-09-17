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
    <h1 class="text-center mb-2">Editar mi perfil</h2>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action=" {{ route('perfil.update', ['perfil' => $perfil->id]) }}" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-3">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre"
                            value="{{ $perfil->user->name }}" placeholder="Tu nombre" />
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="url">Sitio Web</label>
                        <input class="form-control" type="text" name="url" id="url" value="{{ $perfil->user->url }}"
                            placeholder="Sitio web" />
                        @error('url')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                    </div>



                    <div class="form-group mt-3">
                        <label for="biografia">Biografia</label>

                        <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">

                        <trix-editor input="biografia" class="@error('biografia') is-invalid @enderror"></trix-editor>
                        @error('biografia')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="imagen">Foto de perfil</label>
                        <input type="file" name="imagen" id="imagen"
                            class="form-control @error('imagen') is-invalid @enderror">

                        @if ($perfil->imagen)
                            <div class="mt-4 w-100">
                                <p>Imagen Acutal</p>
                                <img src="/storage/{{ $perfil->imagen }}" alt="{{ $perfil->titulo }}" style="width: 300px">
                            </div>
                            @error('imagen')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong> {{ $message }} </strong>
                                </span>
                            @enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn btn-outline-danger">
                    </div>

                </form>
            </div>
        </div>
    @endsection

    @section('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js"
                integrity="sha512-H8CbNdhcOBCt62S6eVGAUSiyNx5OGVEVrYIIVs0iIgurgD1+oTA9THTZ1tqxSE9yw9vzfilg83xgyxD467a28g=="
                crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    @endsection
