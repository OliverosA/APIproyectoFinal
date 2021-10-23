<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'registro';

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'telefono',
        'github',
        'fotografia'
    ];

    protected $primaryKey='id';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
