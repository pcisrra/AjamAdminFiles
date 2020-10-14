<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    protected $table = 'planificacion';
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
        'observaciones'
    ];
}
