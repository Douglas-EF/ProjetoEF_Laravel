<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacoes extends Model
{
    use HasFactory;
    protected $table = 'cotacoes';


    public function StatusAvaliacaoSD()
    {
       return $this->belongsTo(SDAvaliacoesCotacoes::class, 'sd_avaliacao_cotacao_id');
    }
}
#SELECT * FROM cotacao INNER JOIN avaliacao_sd_cota ON cotacao.fk_avaliacao_sd_cota = 2 WHERE avaliacao_sd_cota.id_aval_sd_cota = 2"