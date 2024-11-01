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
        'i_fk_id_pais',
        'vc_direccion',
        'vc_ciudad'
    ];

    public function pais(){ /*Cada ubicacion pertenece a un pais*/
        return $this->belongsTo(Pais::class, 'i_fk_id_pais');
    }
}
