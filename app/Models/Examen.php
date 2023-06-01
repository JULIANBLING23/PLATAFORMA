<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $table = 'examenes';

    public function exam(){
        return $this->belongsToMany(Examen::class, 'user_examenes', 'user_id', 'examenes_id');
    }
}
