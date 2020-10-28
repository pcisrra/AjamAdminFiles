<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    protected $table = 'regional';
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