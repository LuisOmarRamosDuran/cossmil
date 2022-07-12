<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matricula extends Model
{
    use HasFactory;
    protected $table = 'matricula';
    protected $fillable = [
        'id',
        'codigo',
        'id_usuario',
    ];
}
