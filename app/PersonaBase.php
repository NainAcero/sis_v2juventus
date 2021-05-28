<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaBase extends Model
{

    protected $fillable = [
        'persona_id',
        'cargo_id',
        'base_id',
    ];

    public function persona() {
        return $this->belongsTo(Persona::class);
    }

    public function cargo() {
        return $this->belongsTo(Cargo::class);
    }

    public function base() {
        return $this->belongsTo(Base::class);
    }
}
