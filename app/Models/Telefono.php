<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';
    protected $primaryKey = 'id_telefono';
    public $timestamps = false;
    
    protected $fillable = [
        'modelo', 'marca', 'precio', 'stock', 'descripcion', 'imagen'
    ];
}
