<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensListaCompra extends Model
{
    use HasFactory;

    protected $table = 'itens_listas_compras';

    protected $guarded = [];

    public $timestamps = false;

    protected $attributes = [
        'ativo_id' => true
    ];

    public function itens()
    {
        return $this->hasMany(ItensListaCompra::class, 'lista_compra_id');
    }
}
