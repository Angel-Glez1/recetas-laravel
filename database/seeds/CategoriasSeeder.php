<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Comida Mexicana',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Comida Argentina',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Comida Italiana',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Postres',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Cortes',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Comida',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Ensaladas',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Desayunos',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);


        DB::table('categoria_recetas')->insert([
            'nombre' =>  'Comida Congelada',
            'created_at' => date('Ymd H:i.s'),
            'updated_at' => date('Ymd H:i.s'),
        ]);
    }
}
