<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class, 'materia_user', 'materia_id', 'user_id');
    }
    public function temas()
    {
        return $this->hasMany(Temas::class);
    }
}
