<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';
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
