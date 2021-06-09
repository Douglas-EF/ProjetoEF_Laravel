<?php

namespace App\Http\Controllers;

use App\Models\ItensListaControle;
use App\Models\ListaControles;
use Illuminate\Http\Request;

class ItensListaControlesController extends Controller
{
    public function create(ListaControles $lista)
    {
        return view('controle.itens_lista.new', compact('lista'));
    }


    public function store(Request $request)
    {
        $item = new ItensListaControle;

        /*$item->create([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'vencimento_boleto' => $request->vencimento_boleto,
            'valor' => $request->valor,
            'situacao' => $request->situacao,
            'lista_controle_id' => 1
        ]);

        return redirect()->route('controles.show', ['id' => 0]) - with('msg', ['asdf']);*/
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = ItensListaControle::findOrFail($id);

        return view('controle.itens_lista.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
