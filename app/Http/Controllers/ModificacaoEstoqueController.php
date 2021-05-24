<?php

namespace App\Http\Controllers;

use App\Models\ModificacaoEstoque;
use Illuminate\Http\Request;

class ModificacaoEstoqueController extends Controller
{
    public function index()
    {
        $mod_estoque = ModificacaoEstoque::all()->sortByDesc('id');
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    public function search(Request $request)
    {
        $mod_estoque = $this->filtroProduto($request->input('filtro_name_prod'));
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    public function filtroProduto($parametro)
    {
        $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', "%{$parametro}%")->get();
        return $mod_estoque;
    }
}
