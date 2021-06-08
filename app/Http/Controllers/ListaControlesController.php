<?php

namespace App\Http\Controllers;

use App\Models\ListaControles;
use Illuminate\Http\Request;

class ListaControlesController extends Controller
{
    public function index()
    {
        $ListaControles = ListaControles::all()->where('ativo_id', true);
        return view('controle.index', compact('ListaControles'));
    }

    public function create()
    {
        return view('controle.new');
    }

    public function store(Request $request)
    {
        $controle = new ListaControles;
        $controle = $controle->create($request->all());

        return redirect('/controles')->with('msg', ['Lista de controle criada com sucesso!']);
    }

    public function edit($id)
    {
        $controle = ListaControles::findOrFail($id);
        return view('controle.edit', compact('controle'));
    }

    public function update(Request $request, $id)
    {
        $controle = ListaControles::findOrFail($id);
        $controle->update([
            'nome' => $request->nome,
            'data_inicial' => $request->data_inicial,
            'data_final' => $request->data_final
        ]);
        return redirect('/controles')->with('msg', ['Lista de controle atualizada com sucesso!']);
    }

    public function destroy($id)
    {
        $controle = ListaControles::findOrFail($id);
        $controle->update(['ativo_id' => false]);
        return redirect('/controles')->with('msg', ['Lista de controle deletada com sucesso!']);
    }
}
