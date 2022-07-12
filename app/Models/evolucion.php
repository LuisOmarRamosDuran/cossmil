<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evolucion extends Model
{
    use HasFactory;
    protected $table = 'evolucion';
    protected $fillable = [
        'id',
        'c_asegurado',
        'c_beneficiario',
        'diagnostico',
        'conducta',
        'id_sucursal',
        'id_especialidad',
        'id_users',
    ];
}
