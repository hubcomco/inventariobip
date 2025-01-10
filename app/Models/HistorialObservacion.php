<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialObservacion extends Model
{
    use HasFactory;

    protected $table = 'historial_observacion'; 

    protected $primaryKey = 'i_pk_id'; 

    public $timestamps = true; // Para usar created_at y updated_at

    protected $fillable = [
        'i_fk_id_historial',
        'vc_observacion',
    ];

    // Cada observacion pertenece a un historial
    public function historial()
    {
        return $this->belongsTo(Historial::class, 'i_fk_id_historial', 'i_pk_id');
    }
}

