<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol'; 
    protected $primaryKey = 'i_pk_id'; 
    protected $fillable = [ 
        'vc_rol', 
    ];
}
