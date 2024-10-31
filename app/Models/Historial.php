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
      'i_fk_id_persona',
      'i_fk_id_ubicacion',
      'vc_observaciones',
      'd_fecha_observaciones'   
    ];
}
