<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sucursal;
use App\Models\User;

class evolucion extends Model
{
    use HasFactory;
   protected $table = 'evolucion';
    protected $fillable = [

        'diagnostico',
        'conducta',
        'id_sucursal',//
        'id_especialidad',
        'id_users',
    ];
    public function sucursales()
    {
        $this->belongsToMany(sucursal::class, 'evolucion_sucursal', 'id_evolucion');
    }
    public function especialidades()
    {
        $this->belongsToMany(sucursal::class, 'evolucion_especialidad', 'id_evolucion');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
