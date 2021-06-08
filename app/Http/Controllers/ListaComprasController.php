<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaCompras;

class ListaComprasController extends Controller
{
    public function index()
    {
        $listas = ListaCompras::all()->where('ativo_id', true);
        return view('compra.index', compact('listas'));
    }


    # CREATE
    public function create()
    {
        return view('compra.new');
    }

    public function store(Request $request)
    {
        $compra = new ListaCompras;
        $compra = $compra->create($request->all());
        return redirect('/compra')->with('msg', ['Lista de compra criada com sucesso!', 'Cotação criada para esta Lista de compra!']);
    }


    # UPDATE
    public function edit($id)
    {
        $compra = ListaCompras::findOrFail($id);
        return view('compra.edit', compact('compra'));
    }

    public function update(Request $request, $id)
    {
        $compra = ListaCompras::findOrFail($id);
        $compra->update([
            'nome' => $request->nome,
            'data_inicial' => $request->data_inicial,
            'data_final' => $request->data_final
        ]);
        return redirect('/compras')->with('msg', ['Lista de compra atualizada com sucesso!']);
    }


    # "DELETE"
    public function destroy($id)
    {
        $compra = ListaCompras::findOrFail($id);
        $compra->update(['ativo_id' => false]);

        return redirect('/compras')->with('msg', ['Lista de compra deletada com sucesso!']);
    }
}
