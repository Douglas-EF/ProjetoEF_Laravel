<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaCompras;
use App\Models\ItensListaCompra;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ItensListaCompraController extends Controller
{
    public function create(ListaCompras $lista)
    {
        return view('compra.itens_lista.new', compact('lista'));
    }

    public function store(Request $request)
    {
        $item = new ItensListaCompra;

        $item->create([
            'nome' => $request->input('nome'),
            'quantidade' => $request->input('quantidade'),
            'fornecedor' => $request->input('fornecedor'),
            'valor' => $request->input('valor'),
            'categoria' => $request->input('categoria'),
            'lista_compra_id' => $request->input('lista_compra_id')
        ]);

        return redirect()->route('compras.show', ['id' => $request->input('lista_compra_id')])->with('msg', ['Produto adicionado na lista!']);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $item = ItensListaCompra::findOrFail($id);
        return view('compra.itens_lista.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ItensListaCompra::findOrFail($id);
        $item->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'fornecedor' => $request->fornecedor,
            'valor' => $request->valor,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('compras.show', ['id' => $item->lista_compra_id])->with('msg', ['Produto atualizado com sucesso!']);
    }

    public function destroy($id)
    {
        $item = ItensListaCompra::findOrFail($id);

        $item->update(['ativo_id' => false]);

        return redirect()->route('compras.show', ['id' => $item->lista_compra_id])->with('msg', ['Produto deletado com sucesso!']);
    }
}
