<?php

namespace App\Http\Controllers;

use App\Models\ItensListaControle;
use App\Models\ListaControles;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ItensListaControlesController extends Controller
{
    public function create(ListaControles $lista)
    {
        return view('controle.itens_lista.new', compact('lista'));
    }

    public function store(Request $request)
    {
        $item = new ItensListaControle;

        $item->create([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'vencimento_boleto' => $request->vencimento_boleto,
            'valor' => $request->valor,
            'situacao' => $request->situacao,
            'lista_controle_id' => $request->lista_controle_id
        ]);

        return redirect()->route('controles.show', ['id' => $request->lista_controle_id])->with('msg', ['Item cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $item = ItensListaControle::findOrFail($id);

        return view('controle.itens_lista.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ItensListaControle::findOrFail($id);
        $item->update([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'vencimento_boleto' => $request->vencimento_boleto,
            'valor' => $request->valor,
            'situacao' => $request->situacao
        ]);

        return redirect()->route('controles.show', ['id' => $request->lista_controle_id])->with('msg', ['Item atualizado com sucesso!']);
    }

    public function destroy($id)
    {
        $item = ItensListaControle::findOrFail($id);
        $item->update(['ativo_id' => False]);
        
        return redirect()->route('controles.show', ['id' => $item->lista_controle_id])->with('msg', ['Item deletado com sucesso!']);
    }
}
