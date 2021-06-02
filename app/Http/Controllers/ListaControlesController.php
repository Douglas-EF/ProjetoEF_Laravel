
<?php


namespace App\Http\Controllers;

use App\Models\ListaControles;

class ListaControlesController extends Controller
{
    public function index()
    {
        $ListaControles = ListaControles::all();
        return view('/controles', compact('ListaControles'));
    }
}
