<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $guarded = [];

    public $timestamps = false;

    protected $attributes = [
        'ativo_id' => 1
    ];
}
