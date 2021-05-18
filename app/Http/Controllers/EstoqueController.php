<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Produtos;

class EstoqueController extends Controller
#SELECT * FROM estoque INNER JOIN produtos ON produtos.id = estoque.fk_id_prod AND estoque.fk_ativo = 1
{
    public function index()
    {
        $estoque = Estoque::all();
        return view('/estoque', compact('estoque'));
    }
}
