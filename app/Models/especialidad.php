<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidad';
    protected $fillable = [
        'id',
        'nombre',
    ];
    public function especialidades()
    {
        $this->belongsToMany(evolucion::class, 'evolucion_especialidad', 'id_especialidad');
    }
}

