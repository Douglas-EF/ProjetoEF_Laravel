<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotacoes;

class CotacoesController extends Controller
{
    public function index()
    {
        $cotacoes = Cotacoes::where('ativo_id', true)->where('sd_avaliacao_cotacao_id', 1)->get();
        return view('/cotacoes', compact('cotacoes'));
    }
}
