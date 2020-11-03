<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecursoHumano extends Model
{
    protected $table = 'recurso_humano';
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