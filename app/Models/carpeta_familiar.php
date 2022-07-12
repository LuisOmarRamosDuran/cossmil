<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carpeta_familiar extends Model
{
    use HasFactory;
    protected $table = 'carpeta_familiar';
    protected $fillable = [
        'id_users',
        'id_lab',
        'id_doc',
        'id_receta',
        'id_evolucion',
    ];
}
