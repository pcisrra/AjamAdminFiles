<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'asesor';
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
