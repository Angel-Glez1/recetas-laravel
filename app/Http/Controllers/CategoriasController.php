<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{


    public function create()
    {

        // return 'Crear tus recetas';
        return view('categorias.create');
    }




    public function show(CategoriaReceta $categoriaReceta)
    {


        $recetas = Receta::where('categoria_id', $categoriaReceta->id)->paginate(3);


        return view('categorias.show')
            ->with('recetas', $recetas)
            ->with('categoriaReceta', $categoriaReceta);
    }
}
