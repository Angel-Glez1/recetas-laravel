@extends('layouts.app')


@section('botones')
    @include('ui.navegation')
@endsection

@section('content')
    <h2 class="text-center mb-2">Administra tus Recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <div>
            {{ $recetas->links() }}
        </div>

        <table class="table">
            <thead class="bg-danger text-light">
                <tr class="text-center">
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Accions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($recetas as $r)
                    <tr>
                        <td> {{ $r->titulo }} </td>
                        <td> {{ $r->categoria->nombre }} </td>
                        <td>
                            <eliminar-receta
                                receta-id={{$r->id}}
                            ></eliminar-receta>
                            <a href="{{ route('recetas.edit', ['receta' => $r->id ]) }}" class="btn btn-dark mt-1 d-block">Editar</a>
                            <a href="{{ route('recetas.show', ['receta' => $r->id ]) }}" class="btn btn-success mt-1 d-block">Ver</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            <ul class="list-group">
                @foreach ($usuario->Megusta as $receta)

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3>{{ $receta->titulo }}</h3>
                        <a class="btn btn-outline-success text-uppercase" href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver receta</a>
                    </li>

                @endforeach
            </ul>
        </div>

    </div>
@endsection
