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
        //
        'id_especialidad',
        'id_users',
    ];
    public function sucursales()
    {
        return $this->belongsToMany(sucursal::class, 'evolucion_sucursal', 'evolucion_id');
    }
    public function especialidades()
    {
        return $this->belongsToMany(especialidad::class, 'evolucion_especialidad', 'evolucion_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'evolucion_user', 'evolucion_id');
    }
}
