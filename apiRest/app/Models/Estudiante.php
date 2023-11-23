<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profesores()
    {
        return $this->belongsToMany(Profesore::class);
    }

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class);
    }

}
