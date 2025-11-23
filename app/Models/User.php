<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'direccion',
        'telefono',
        'fecha_registro',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
