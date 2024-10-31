<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table ='historial';
    protected $primaryKey ='i_pk_id';

    protected $fillable =[
     'i_fk_id_equipo',	
      'i_fk_id_empleado',
      'i_fk_id_ubicacion',
      'vc_observaciones',
      'd_fecha_observaciones'   
    ];

    public function equipo(){
      return $this->belongsTo(Equipo::class, 'i_fk_id_equipo');
    }
    public function empleado(){
      return $this->belongsTo(Empleado::class, 'i_fk_id_empleado');
    }
    public function ubicaciones(){
      return $this->belongsTo(Ubicacion::class, 'i_fk_id_ubicacion');
    }
}
