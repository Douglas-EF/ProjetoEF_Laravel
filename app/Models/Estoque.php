<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = "estoque";

    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'fk_id_prod');
    }
}
