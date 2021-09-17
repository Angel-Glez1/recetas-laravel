<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dateFormat = 'Ymd H:i.s';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Evento para crear un perfil cuando el usuario se crea
    protected static function boot()
    {
        parent::boot();

        // Asignar perfil
        static::created(function($user){
            $user->perfil()->create();
        });
    }

    // Relacion para obtener todas las recetas que el usuario cree (1:N)
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }


    // Relacion para obtener el perfil del usuario (1:1)
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }


    // Relacion para obtener las recetas que el usuario de haya dado like
    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'likes_receta');
    }


}
