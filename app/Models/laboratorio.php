<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorio';
    protected $fillable = [
        'id',
        'tipo',
        'id_responsable',
        'id_documento',
        'user_id',
        'id_evolution',
    ];

    public function evolucion()
    {
        return $this->belongsTo(evolucion::class, 'id_evolution');
    }

    public function documento()
    {
        return $this->belongsTo(documento::class, 'id_documento');
    }

}
