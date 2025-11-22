<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_telefono',
        'cantidad',
        'fecha_agregado',
    ];

    public function telefono()
    {
        return $this->belongsTo(Telefono::class, 'id_telefono', 'id_telefono');
    }
}
