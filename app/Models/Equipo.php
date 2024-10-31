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
        'i_fk_id_empleado'
    ];

    public function historial(){
        return $this->hasMany(Historial::class, 'i_fk_id_equipo');
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'i_fk_id_empleado');
    }

    public function ubicaciones(){
        return $this->belongsTo(Ubicacion::class, 'i_fk_id_ubicacion');
    }
}
