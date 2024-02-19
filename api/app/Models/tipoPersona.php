<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPersona extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'tipo',
    ];
}
