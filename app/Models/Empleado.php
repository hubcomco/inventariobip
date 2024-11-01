<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'i_pk_id';
    
    protected $fillable = [
        'vc_nombre',	
        'vc_apellido',	
        'vc_cargo',	
        'vc_usuario_DA',
        'vc_email',
        'vc_telefono',
        'i_fk_id_ubicacion'
    ];

    public function historial(){ /*Un empleado puede tener varios registros en el historial*/
        return $this->hasMany(Historial::class, 'i_fk_id_empleado');
    }

    public function ubicaciones(){ /*Cada empleado se asocia a una ubicacion*/
        return $this->belongsTo(Ubicacion::class, 'i_fk_id_ubicacion');
    }
}
