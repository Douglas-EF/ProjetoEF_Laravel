<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaCompras;

class ListaComprasController extends Controller
{
    public function index()
    {
        $listas = ListaCompras::all();
        return view('/compra', compact('listas'));
    }
}
