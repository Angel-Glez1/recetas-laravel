<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\CategoriaReceta;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {
            // Prover las categorias a todas la vistas
            $categorias = CategoriaReceta::all();
            $view->with('categorias', $categorias);
        });



    }
}
