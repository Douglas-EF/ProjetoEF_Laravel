<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaCompras extends Model
{
    use HasFactory;
    
    protected $table = "listas_compras";

    protected $guarded = [];

    public $timestamps = false;

    protected $dates = ['data_inicial', 'data_final'];

    protected $attributes = [
        'ativo_id' => true
    ];

    public function itens_lista()
    {
        return $this->hasMany(
            ItensListaCompra::class, 
            'lista_compra_id'
        );
    }
}
