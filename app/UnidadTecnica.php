<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadTecnica extends Model
{
    protected $table = 'unidad_tecnica';
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