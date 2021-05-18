<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'marca',
        'categoria',
        'observacao',
    ];

    public $timestamps = false;

    protected $attributes = [
        'fk_ativo' => 1
    ];
}
