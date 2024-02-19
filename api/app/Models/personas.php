<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'nombre',
        'apellido',
        'DNI', 
        'telefono', 
        'email', 
        'especialidad', 
        'tipos_personas', 
    ];
}
