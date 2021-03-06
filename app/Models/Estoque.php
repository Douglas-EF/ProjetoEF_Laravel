<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = "estoque";

    protected $guarded = [];

    public $timestamps = false;

    public function produtos()
    {
        return $this->belongsTo(Produtos::class, 'produto_id');
    }
}
