<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $dateFormat = 'Ymd H:i.s';
    
    // relacion 1:1 cons user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
