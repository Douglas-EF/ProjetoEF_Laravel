<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModificacaoEstoque extends Model
{
    use HasFactory;

    protected $table = 'modificacao_estoque';

    public $timestamps = false;

    protected $guarded = [];
}
