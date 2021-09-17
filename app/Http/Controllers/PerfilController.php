<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{


    public function __construct() {
        $this->middleware('auth', ['except' => 'show']);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {

        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(5);


        return view('perfil.show', compact('perfil', 'recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        // Ejecutar el policy para bloquear la vista
        $this->authorize('view', $perfil);

        return view('perfil.edit')->with('perfil', $perfil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        // Ejecutar el policy
        $this->authorize('update', $perfil);


        $data = $request->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required'
        ]);

        // Subir una imagen al servidor
        if($request['imagen']){

            $path = $request->imagen->store('upload-perfiles', 'public');


            $array_imagen = ['imagen' => $path];

        }



        // Actulizar la table de user
        Auth::user()->name = $data['nombre'];
        Auth::user()->url = $data['url'];
        Auth::user()->save();

        // Borrar los campos que se quieren inyectar a la tabla de perfil
        unset($data['nombre']);
        unset($data['url']);


        // Actualizar la tabla de perfil
        Auth::user()->perfil()->update(array_merge(
            $data,
            $array_imagen ?? []
        ));

        return redirect()->action('RecetaController@index');
    }



}
