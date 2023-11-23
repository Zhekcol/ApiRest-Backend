<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesore::class);
    }

}
