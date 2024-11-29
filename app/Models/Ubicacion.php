<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion';
    protected $primaryKey = 'i_pk_id';
    
    protected $fillable = [
        'vc_pais',
        'vc_direccion',
        'vc_ciudad'
    ];

    public function historiales()
    {
        return $this->hasMany(Historial::class, 'i_fk_id_ubicacion');
    }
}
