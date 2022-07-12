<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;
    protected $table = 'documento';
    protected $fillable = [
        'id',
        'nombre',
        'url',
        'id_informe',
    ];
}
