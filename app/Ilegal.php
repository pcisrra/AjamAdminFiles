<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ilegal extends Model
{
    protected $table = 'mineria_ilegal';
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
