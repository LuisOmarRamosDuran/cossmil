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
        $this->belongsToMany(evolucion::class, 'evolucio_sucursal', 'id_sucursal');
    }
}
