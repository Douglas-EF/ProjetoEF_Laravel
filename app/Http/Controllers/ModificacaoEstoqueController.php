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
        $mod_estoque = ModificacaoEstoque::all()->sortByDesc('id');
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    // BUSCAR POR NOME DO PRODUTO
    public function search(Request $request)
    {
        $mod_estoque = $this->filtroProduto($request->input('filtro_name_prod'));
        $request->flash();
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    public function filtroProduto($parametro)
    {
        $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', "%{$parametro}%")->get();
        return $mod_estoque;
    }

    // BUSCAR POR PERÍODO
    public function searchdate(Request $request)
    {
        $mod_estoque = $this->filtroDates($request->input('data_inicial'), $request->input('data_final'));
        return view('/modificacao_estoque', compact('mod_estoque'));
    }

    public function filtroDates($data_inicial, $data_final)
    {
        $mod_estoque = ModificacaoEstoque::whereBetween('data', ["{$data_inicial}", "{$data_final}"])->get();
        return $mod_estoque;
    }

    // PDF

    public function gerarPDF(Request $request)
    {
        $opc_relatorio = $request->input('opc_relatorio');
        dd($opc_relatorio);
        switch ($opc_relatorio) {
            case 'relatorio_full':
                $teste = $request->old('modificacao_estoque');                
                break;

            case 'relatorio_nome_produto':
                $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', "%{$request->old('filtro_name_prod')}%");
                break;

            case 'relatorio_periodo_date':
                $mod_estoque = ModificacaoEstoque::whereBetween('data', ["{$request->old('data_inicial')}", "{$request->old('data_final')}"]);
                break;
        }

        $pdf = PDF::loadView('pdf', compact('mod_estoque'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf');
    }
}
