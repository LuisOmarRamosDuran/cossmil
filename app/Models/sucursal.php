<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\evolucion;

class sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';
    protected $fillable = [
        'id',
        'nombre',
    ];

    public function evoluciones()
    {
        return $this->belongsToMany(evolucion::class, 'evolucion_sucursal', 'sucursal_id');
    }
}
