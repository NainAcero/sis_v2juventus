<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{

    protected $fillable = [
        'name',
        'descripcion',
        'profesion_id'
    ];
}
