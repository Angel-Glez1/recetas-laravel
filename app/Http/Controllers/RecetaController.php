<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        // Proteger las acciones del controlador sin no esta autentificado el usuario y a su vex dejar publico el metodo se show y serach
        // $this->middleware('auth')->except('show', 'serach');
        $this->middleware('auth', ['except' => ['show', 'serach']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuario = auth()->user();
        $recetas =  Receta::where('user_id', $usuario->id)->paginate(5);

        return view('recetas.index')
            ->with('recetas', $recetas)
            ->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO Obtener las categorias sin MODELO
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');


        //? Obtener categorias con MODELO
        $categorias =  CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validación
        $data = $request->validate([
            'titulo' => 'required|min:4',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image'
        ]);


        // Sube un imagen al servidor y regresa el path
        $path_img = $request['imagen']->store('upload-recetas', 'public');

        // Resize with GD Library
        // $img = Image::make(public_path("storage/{$path_img}"))->fit(1000,550);
        // $img->save();


        //? Almacenar el db sin MODEL
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $path_img,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria'],
        // ]);


        //TODO: Almacenar Con modelo(funciones)
        // auth()->user()->recetas()->create([
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $path_img,
        //     'categoria_id' => $data['categoria'],
        // ]);

        // TODO : Almacenar con modelo(Instancia)
        $receta = new Receta();
        $receta->user_id = Auth::user()->id;
        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        $receta->imagen = $path_img;
        $receta->categoria_id = $data['categoria'];

        $receta->save();

        // Redireccionar a una ACCION de mi controller
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {

        // Obtener si el usuario actual le dio like a la receta que se muestra
        $like = (auth()->user()) ?  auth()->user()->meGusta->contains($receta->id)  : false;


        // Obtener el numero de likes que tine un receta
        $likes = $receta->likes->count();

        return view('recetas.show')
            ->with('receta', $receta)
            ->with('like', $like)
            ->with('likes', $likes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {

        $this->authorize('view', $receta);
        $categorias =  CategoriaReceta::all(['id', 'nombre']);
        return view('recetas.edit')
            ->with('receta', $receta)
            ->with('categorias', $categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // Revisar el policy
        $this->authorize('update', $receta);


        // Validación
        $data = $request->validate([
            'titulo' => 'required|min:4',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
        ]);


        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        $receta->categoria_id = $data['categoria'];

        // Si sube una nueva imagen
        if (request('imagen')) {

            $path_img = $request['imagen']->store('upload-recetas', 'public');
            $receta->imagen = $path_img;
        }

        $receta->save();

        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Ejecutar el policy
        $this->authorize('delete', $receta);

        // Eliminar
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }


    public function serach(Request $request )
    {
        $busqueda = $request['buscar'];

        // Buscador
        $recetas = Receta::where('titulo', 'like', '%'.  $busqueda. '%' )->paginate(2);
        return view('busquedas.show', compact('recetas', 'busqueda'));

    }


}
