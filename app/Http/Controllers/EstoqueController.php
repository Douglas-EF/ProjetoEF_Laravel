<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\ModificacaoEstoque;

date_default_timezone_set("America/Manaus");

class EstoqueController extends Controller
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

    public function create()
    {
    }

    public function update(Request $request, Estoque $estoque)
    {
        $new_qtd = $request->input('new_quantidade');
        $old_qtd = $estoque->quantidade;
        $operaco = $request->input('operacao');

        $operaco == 'subtracao' ? $result = $old_qtd - $new_qtd : $result = $old_qtd + $new_qtd;

        $estoque->update(['quantidade' => $result]);

        $mod_estoque = new ModificacaoEstoque();
        $mod_estoque = $mod_estoque->create([
            'nome_produto' => $estoque->nome,
            'nome_usuario' => 'Douglas',
            'data' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'quantidade_anterior' => $old_qtd,
            'quantidade_modificada' => $result,
            'estoque_id' => 1,
            'usuario_id' => 1
        ]);

        return redirect('/estoque');
    }
}
