<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensListaControle extends Model
{
    use HasFactory;

    protected $table = 'itens_listas_controles';

    protected $guarded = [];

    public $timestamps = false;

    protected $attributes = [
        'ativo_id' => true
    ];
}
