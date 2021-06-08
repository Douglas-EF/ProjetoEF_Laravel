<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaControles extends Model
{
    use HasFactory;

    protected $table = 'listas_controles';

    protected $guarded = [];

    public $timestamps = false;

    protected $dates = ['data_inicial', 'data_final'];

    protected $attributes = [
        'ativo_id' => 1
    ];
    
}
