<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'direccion',
        'fecha_nacimiento',
        'telefono',
        'profesion_id'
    ];
}
