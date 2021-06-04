<?php

namespace App\Http\Controllers;

use App\Models\ModificacaoEstoque;
use DateTime;
use DateTimeInterface;
use Illuminate\Http\Request;
use PDF;

class ModificacaoEstoqueController extends Controller
{
    public function index()
    {
        $mod_estoque = ModificacaoEstoque::orderBy('id', 'desc')->paginate();
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    // BUSCAR POR NOME E PERÍODO
    public function search(Request $request)
    {
        $filters = $request->all();
        $request->flash();
        $mod_estoque = $this->filterModEstoque($request, true);

        return view('/modificacao_estoque', compact('mod_estoque', 'filters'));
    }

    protected function filterModEstoque(Request $request, bool $paginate)
    {
        $query = ModificacaoEstoque::query();

        if ($request->input('nome_prod')) {
            $query->where('nome_produto', 'LIKE', '%' . $request->input('nome_prod') . '%');
        }

        if ($request->input('data_inicial')) {
            $query->whereDate('data', '>=', $request->input('data_inicial'));
        }

        if ($request->input('data_final')) {
            $query->whereDate('data', '<=', $request->input('data_final'));
        }

        if ($paginate) {
            return $query->paginate();
        } else {
            return $query->get();
        }
    }

    // PDF

    public function gerarPDF(Request $request)
    {
        return PDF::loadView(
                'pdf',
                ['mod_estoque' => $this->filterModEstoque($request, false)]
            )
            ->setPaper('a4')
            ->stream('Relatório.pdf');
    }
}
