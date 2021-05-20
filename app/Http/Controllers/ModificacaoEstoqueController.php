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
}
