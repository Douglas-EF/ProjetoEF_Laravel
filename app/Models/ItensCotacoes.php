<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensCotacoes extends Model
{
    use HasFactory;

    protected $table = 'itens_cotacoes';

    public $timestamps = false;

    protected $guarded = [];

    protected $attributes = [
        'sd_avaliacao_id' => 1,
        'sd_situacao_avaliacao_id' => 1,
        'ativo_id' => true,
    ];
}
