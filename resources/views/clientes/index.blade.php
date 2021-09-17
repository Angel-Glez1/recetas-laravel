@extends('layouts.app')

@section('botones')
    @include('ui.navegation')
@endsection

@section('content')
    <h2 class="text-center mb-2">Clientes : {{ count($clientes) }} </h2>
        <div>
            {{ $clientes->links() }}
        </div>


        <table class="table bg-white">
            <thead class="bg-danger text-light">
                <tr>
                    <th scope="col">ID_CREDITO</th>
                    <th scope="col">ID_PERSONA</th>
                    <th scope="col">RFC</th>
                    <th scope="col">CURP</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">MOROSIDAD</th>
                    <th scope="col">SEGMENTACION</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">FECHA_DE_ASIGNACION</th>
                    <th scope="col">Tel_1</th>
                    <th scope="col">Tel_2</th>
                    <th scope="col">Tel_3</th>
                    <th scope="col">Tel_4</th>
                    <th scope="col">Tel_5</th>
                    <th scope="col">EMAIL_1</th>
                    <th scope="col">EMAIL_2</th>
                    <th scope="col">EMAIL_3</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->ID_CREDITO}}</td>
                        <td>{{$cliente->ID_PERSONA}}</td>
                        <td>{{$cliente->RFC}}</td>
                        <td>{{$cliente->CURP}}</td>
                        <td>{{$cliente->NOMBRE}}</td>
                        <td>{{$cliente->MOROSIDAD}}</td>
                        <td>{{$cliente->SEGMENTACION}}</td>
                        <td>{{$cliente->ESTADO}}</td>
                        <td>{{$cliente->FECHA_DE_ASIGNACION}}</td>
                        <td>{{$cliente->Tel_1}}</td>
                        <td>{{$cliente->Tel_2}}</td>
                        <td>{{$cliente->Tel_3}}</td>
                        <td>{{$cliente->Tel_4}}</td>
                        <td>{{$cliente->Tel_5}}</td>
                        <td>{{$cliente->EMAIL_1}}</td>
                        <td>{{$cliente->EMAIL_2}}</td>
                        <td>{{$cliente->EMAIL_3}}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection

