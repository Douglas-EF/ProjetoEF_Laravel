<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaControles extends Model
{
    use HasFactory;
    protected $table = 'listas_controles';

    public function Ativo()
    {
        return $this->belongsTo(Ativos::class, 'ativo_id');
    }
}
