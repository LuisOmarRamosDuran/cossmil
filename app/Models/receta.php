<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receta extends Model
{
    use HasFactory;
    protected $table = 'receta';
    protected $fillable = [
        'id',
        'codigoReceta',
        'id_responsable',
        'id_paciente',
        'id_evolucion',
        'medicamento',
        'cantidad',
        'aplicacionMedicamento',
    ];

    public function evolucion()
    {
        return $this->belongsTo(evolucion::class,'id_evolucion');
    }
}
