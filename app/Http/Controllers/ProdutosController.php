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
        $produtos = Produtos::where('ativo_id', true)->get();
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
        return Redirect::to('/produtos');
    }
}
