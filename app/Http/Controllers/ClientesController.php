<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(100);
        
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contentFile = file_get_contents($request['fclientes']);
        $clientes = json_decode($contentFile, true);

        // Quitar clientes duplicados.
        $uniquedCliente = $this->clearDuplicateItems($clientes, 'ID_CREDITO');


        foreach ($uniquedCliente as $cliente) {

            $ID_CREDITO = $cliente['ID_CREDITO'];
            $ID_PERSONA = $cliente['ID_PERSONA'];
            $RFC = $cliente['RFC'] ?? null;
            $CURP = $cliente['CURP'] ?? null;
            $NOMBRE = $cliente['NOMBRE'] ?? null;
            $MOROSIDAD = $cliente['MOROSIDAD'] ?? null;
            $SEGMENTACION = $cliente['SEGMENTACION'] ?? null;
            $ESTADO = $cliente['ESTADO'] ?? null;
            $FECHA_DE_ASIGNACION = $cliente['FECHA_DE_ASIGNACION'] ?? null;
            $Tel_1 = $cliente['Tel_1'] ?? null;
            $Tel_2 = $cliente['Tel_2'] ?? null;
            $Tel_3 = $cliente['Tel_3'] ?? null;
            $Tel_4 = $cliente['Tel_4'] ?? null;
            $Tel_5 = $cliente['Tel_5'] ?? null;
            $EMAIL_1 = $cliente['EMAIL_1'] ?? null;
            $EMAIL_2 = $cliente['EMAIL_2'] ?? null;
            $EMAIL_3 = $cliente['EMAIL_3'] ?? null;



            DB::update('EXEC SP_Insertar_Clientes_Masivo ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
                $ID_CREDITO,
                $ID_PERSONA,
                $RFC,
                $CURP,
                $NOMBRE,
                $MOROSIDAD,
                $SEGMENTACION,
                $ESTADO,
                $FECHA_DE_ASIGNACION,
                $Tel_1,
                $Tel_2,
                $Tel_3,
                $Tel_4,
                $Tel_5,
                $EMAIL_1,
                $EMAIL_2,
                $EMAIL_3
            ]);


        }


        return redirect()->action('ClientesController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function clearDuplicateItems($array, $key)
    {


        $temp_array = array();
        $i = 0;
        $key_array = array();


        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {


                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }

            $i++;
        }


        return array_values($temp_array);
    }

}
