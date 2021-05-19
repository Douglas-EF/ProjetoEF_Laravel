<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaCompras;
use Illuminate\Support\Facades\Redirect;

class ListaComprasController extends Controller
{
    public function index()
    {
        $listas = ListaCompras::all();
        return view('/compra', compact('listas'));
    }

    public function create()
    {
        return view('compra_new');
    }
    public function stores(Request $request)
    {
        $compra = new ListaCompras;
        $compra = $compra->create($request->all());
        return Redirect::to('/compra');
    }


}
