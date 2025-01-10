<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table ='equipo';
    protected $primaryKey ='i_pk_id';

    protected $fillable=[
        'vc_nombre_equipo',
        't_componentes_generales',
        'vc_serial_equipo',
        'vc_marca',
        'vc_modelo',
        'd_fecha_compra',
        'dec_costo_equipo',
        'vc_estado_equipo',	
        'vc_garantia_equipo',
        'i_fk_id_ubicacion',
        'i_fk_id_empleado',
        'i_fk_id_tipo'
    ];

    public function historial(){ /*Cada equipo puede tener varios registros en el historial*/
        return $this->hasMany(Historial::class, 'i_fk_id_equipo');
    }

    public function empleado(){ /*Cada equipo se asocia a un empleado*/
        return $this->belongsTo(Empleado::class, 'i_fk_id_empleado');
    }

    public function ubicaciones(){ /*Cada equipo se asocia a una ubicacion*/
        return $this->belongsTo(Ubicacion::class, 'i_fk_id_ubicacion');
    }

    public function tipoEquipo(){/*Cada equipo tiene un tipo*/
        return $this->belongsTo(TipoEquipo::class, 'i_fk_id_tipo', 'i_pk_id');
    }

    public function asignaciones(){/*Cada empleado tiene un equipo asignado*/
        return $this->hasMany(Asignacion::class, 'i_fk_id_equipo', 'i_pk_id');
    }
}
