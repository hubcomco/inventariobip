<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    protected $table = 'tipos_equipos';
    protected $primaryKey = 'i_pk_id'; 
    protected $fillable = [
        'vc_tipo',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'tipo_equipo_id', 'i_pk_id');
    }
}
