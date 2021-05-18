<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotacoes;

class CotacoesController extends Controller
{
    public function index()
    {
        $cotacoes = Cotacoes::where('fk_ativo', true)->where('fk_sd_aval_cota', 1)->get();
        return view('/cotacoes', compact('cotacoes'));
    }
}
