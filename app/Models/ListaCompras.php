<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaCompras extends Model
{
    use HasFactory;
    protected $table = "listas_compras";


    protected $attributes = [
        'ativo_id' => 1
    ];
}
