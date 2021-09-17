<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
         "ID_CREDITO"
        ,"ID_PERSONA"
        ,"RFC"
        ,"CURP"
        ,"NOMBRE"
        ,"MOROSIDAD"
        ,"SEGMENTACION"
        ,"ESTADO"
        ,"FECHA_DE_ASIGNACION"
        ,"Tel_1"
        ,"Tel_2"
        ,"Tel_3"
        ,"Tel_4"
        ,"Tel_5"
        ,"EMAIL_1"
        ,"EMAIL_2"
        ,"EMAIL_3"
    ];
}
