<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $table = 'asignaciones';
    protected $fillable = [
        'i_fk_id_empleado',
        'i_fk_id_equipo',
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'i_fk_id_empleado', 'i_pk_id');
    }

    public function equipo(){
        return $this->belongsTo(Equipo::class, 'i_fk_id_equipo', 'i_pk_id');
    }
}
