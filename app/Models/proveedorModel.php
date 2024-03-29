<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedorModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProveedor';
    protected $table = 'proveedores';
    protected $fillable = [
        'razonSocial',
        'nombreCompleto',
        'direccion',
        'telefono',
        'correo',
        'rfc'
    ];
}
