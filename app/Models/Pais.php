<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'pais';
    protected $primaryKey = 'i_pk_id';
    
    protected $fillable = [
        'vc_pais',
    ];
}
