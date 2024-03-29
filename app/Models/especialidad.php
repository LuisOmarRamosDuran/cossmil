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
    public function evoluciones()
    {
        return $this->belongsToMany(evolucion::class, 'evolucion_especialidad', 'especialidad_id');
    }
}

