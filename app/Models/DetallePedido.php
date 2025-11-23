<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $primaryKey = 'id_detalle';
    public $timestamps = false;
    protected $fillable = ['id_pedido', 'id_telefono', 'cantidad', 'precio_unitario'];

    public function telefono()
    {
        return $this->belongsTo(Telefono::class, 'id_telefono');
    }
}
