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
        $estoque = Estoque::where('ativo_id', true)->orderBy('id', 'DESC')->paginate();
        return view('estoque.index', compact('estoque'));
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $estoque = Estoque::where('nome', 'LIKE', "%{$request->input('filtro')}%")->where('ativo_id', true)->orderBy('id', 'DESC')->paginate();
        return view('estoque.index', compact('estoque', 'filters'));
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
