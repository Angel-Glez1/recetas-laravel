<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $dateFormat = 'Ymd H:i.s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion', 'imagen', 'categoria_id'
    ];


    //Obtine la categoria ala que pertenece la receta  TypeRelaction -> 1:1
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class, 'categoria_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // TODO: Relacion N:N likes que se les da las recetas
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');

    }

}
