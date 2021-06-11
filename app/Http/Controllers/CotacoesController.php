<?php

namespace App\Http\Controllers;

use App\Models\Cotacoes;

class CotacoesController extends Controller
{
    public function index()
    {
        $cotacoes = Cotacoes::where('ativo_id', true)->where('sd_avaliacao_cotacao_id', 1)->get();
        return view('cotacao.index', compact('cotacoes'));
    }

    public function show($id)
    {
        $cotacoes = Cotacoes::findOrFail($id);
        return view('cotacao.itens', compact('cotacoes'));
    }
}
