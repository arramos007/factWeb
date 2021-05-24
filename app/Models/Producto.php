<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_principal_producto',
        'codigo_auxiliar_producto',
        'nombre',
        'valor_unitario',
        'tipo_productos_id',
        'users_id'
    ];

}