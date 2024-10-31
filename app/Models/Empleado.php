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
}
