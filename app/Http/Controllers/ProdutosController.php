<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::where('ativo_id', true)->paginate(5);
        return view('/produtos', compact('produtos'));
    }

    public function create()
    {
        return view('/produtos_new');
    }

    public function store(Request $request)
    {
        $produtos = new Produtos();
        $produtos = $produtos->create($request->all());
        return redirect('/produtos')->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produtos::findOrFail($id);
        return view('produto_edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->update([
            'nome' => $request->nome,
            'marca' => $request->marca,
            'categoria' => $request->categoria,
            'observacao' => $request->observacao
        ]);

        return redirect('/produtos')->with('msg', 'Produto atualizado com sucesso!');
    }

    public function destroy(Request $request)
    {
        $produto = Produtos::findOrFail($request->input('id'));
        $produto->update(['ativo_id' => false]);

        return redirect('/produtos')->with('msg', 'Produto deletado com sucesso!');
    }
}
