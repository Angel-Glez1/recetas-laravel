<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','InicioController@index');

// Recetas
Route::get('/recetas', 'RecetaController@index' )->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create' )->name('recetas.create');
Route::post('/recetas', 'RecetaController@store')->name('recetas.store');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetas.show');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('recetas.update');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');


// Categorias
Route::get('/categoria/create', 'CategoriasController@create')->name('categorias.create');
Route::get('/categoria/{categoriaReceta}', 'CategoriasController@show')->name('categorias.show');


// Perfil
Route::get('/perfil/{perfil}', 'PerfilController@show')->name('perfil.show');
Route::get('/perfil/{perfil}/edit', 'PerfilController@edit')->name('perfil.edit');
Route::put('/perfil/{perfil}', 'PerfilController@update')->name('perfil.update');


// Buscardor de recetas
Route::get('/buscar',  'RecetaController@serach')->name('buscar.search');


// Likes
Route::post('/likes/{receta}', 'LikesController@update' )->name('likes.update');

// Clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
Route::post('/clientes', 'ClientesController@store')->name('clientes.store');



Auth::routes();










