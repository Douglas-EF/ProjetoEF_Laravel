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

    public function search(Request $request)
    {
        $estoque = $this->filtroProdutos($request->input('filtro'));
        return view('/estoque', compact('estoque'));
    }

    public function filtroProdutos($filtro)
    {
        $estoque = Estoque::where('nome', 'like', "%{$filtro}%")->get();
        return $estoque;
    }

    public function update($id, Request $request)
    {
        dd($id);
    }
}
