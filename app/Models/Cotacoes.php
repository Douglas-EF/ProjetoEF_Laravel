<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacoes extends Model
{
    use HasFactory;
    protected $table = 'cotacoes';


    public function itens_cotacao()
    {
        //return $this->hasMany();
    }

    public function itens_lista_cotacao()
    {
        return $this->hasMany(ItensCotacoes::class, 'cotacao_id');
    }
    
    public function compra()
    {
        return $this->belongsTo(ListaCompras::class, 'lista_compra_id');
    }


    public function status_avaliacao_sd()
    {
       return $this->belongsTo(SDAvaliacoesCotacoes::class, 'sd_avaliacao_cotacao_id');
    }

    
}
#SELECT * FROM cotacao INNER JOIN avaliacao_sd_cota ON cotacao.fk_avaliacao_sd_cota = 2 WHERE avaliacao_sd_cota.id_aval_sd_cota = 2"