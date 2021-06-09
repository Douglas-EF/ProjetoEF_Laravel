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
        $produtos = Produtos::where('ativo_id', true)->orderBy('id', 'DESC')->paginate();
        return view('produto.index', compact('produtos'));
    }


    # PESQUISA
    public function search(Request $request)
    {
        $filters = $request->all();
        $produtos = Produtos::where('nome', 'LIKE', "%{$request->input('filtro')}%")->where('ativo_id', true)->orderBy('id', 'DESC')->paginate();
        return view('produto.index', compact('produtos', 'filters'));
    }


    # CREATE
    public function create()
    {
        return view('produto.new');
    }

    public function store(Request $request)
    {
        $produtos = new Produtos();
        $produtos = $produtos->create($request->all());
        return redirect('/produtos')->with('msg', ['Produto cadastrado com sucesso!', 'Produto inserido no estoque!']);
    }


    # UPDATE
    public function edit($id)
    {
        $produto = Produtos::findOrFail($id);
        return view('produto.edit', compact('produto'));
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

        return redirect('/produtos')->with('msg', ['Produto atualizado com sucesso!', 'Produto atualizado no estoque!']);
    }

    # "DELETE" 
    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->update(['ativo_id' => false]);

        return redirect('/produtos')->with('msg', ['Produto deletado com sucesso!', 'Produto removido do estoque!']);
    }
}
