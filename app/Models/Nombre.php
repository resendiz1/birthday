<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nombre extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'Area_trabajo', 'email', 'fecha_nacimiento'];
}
