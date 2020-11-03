<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiscalizacion extends Model
{
    protected $table = 'fiscalizacion';
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