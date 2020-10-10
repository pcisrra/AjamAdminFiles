<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juridica extends Model
{
    protected $table = 'direccion_juridica';
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
