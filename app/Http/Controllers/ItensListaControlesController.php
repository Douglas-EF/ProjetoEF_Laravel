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

        $item->create([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'vencimento_boleto' => $request->vencimento_boleto,
            'valor' => $request->valor,
            'situacao' => $request->situacao,
            'lista_controle_id' => $request->id_lista
        ]);

        return redirect()->route('controles.show', ['id' => 0]) - with('msg', ['']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        dd($id);
        $item = ItensListaControle::findOrFail($id);
        
        return view('controle.itens_lista.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ItensListaControle::findOrFail($id);
        $item->update([
            'lista_controle_id' => $id,
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'vencimento_boleto' => $request->vencimento_boleto,
            'valor' => $request->valor,

        ]);

        return redirect('controles.show', ['id' => $id])->with('msg', ['Item atualizado com sucesso!']);
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
