<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {

        // TODO -> Obtener las ultimas recetas publicadas...
        $nuevas = Receta::latest()->take(5)->get();
        //* el metodo latest() sirve para ordernar por la fecha de created_at


        //TODO -> Obtener todas las recetas y agruparlas por sus categorias
        $categorias = CategoriaReceta::all();
        $recetas = [];
        foreach ($categorias as $categoria ) {
            $recetas[ Str::slug( $categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->take(5)->get();
        }

        // TODO -> Obtener las recetas con las likes
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'DESC')->take(3)->get();


        // Mostrar la vista.
        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
