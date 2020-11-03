<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaceta extends Model
{
    protected $table = 'gaceta';
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