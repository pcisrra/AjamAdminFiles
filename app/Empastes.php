<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empastes extends Model
{
    protected $fillable = [
        'estante',
        'cuerpo',
        'balda',
        'contenedor',
        'gestion',
        'descripcion',
        'antecedente',
        'data_institucional',
        'ambiente',
        'observaciones',
        'disponibilidad'
    ];
}
