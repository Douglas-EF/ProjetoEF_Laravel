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

    // BUSCAR POR NOME DO PRODUTO
    public function search(Request $request)
    {
        $filters = $request->all();
        $request->flash();
        $mod_estoque = $this->filtroProduto($request->input('filtro_name_prod'));
        return view('/modificacao_estoque', compact('mod_estoque', 'filters'));
    }

    public function filtroProduto($parametro)
    {
        $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', "%{$parametro}%")->paginate();
        return $mod_estoque;
    }

    // BUSCAR POR PERÍODO
    public function searchdate(Request $request)
    {
        $filters = $request->all();
        $request->flash();
        $mod_estoque = $this->filtroDates($request->input('data_inicial'), $request->input('data_final'));
        return view('/modificacao_estoque', compact('mod_estoque', 'filters'));
    }

    public function filtroDates($data_inicial, $data_final)
    {
        $mod_estoque = ModificacaoEstoque::whereBetween('data', ["{$data_inicial}", "{$data_final}"])->paginate();
        return $mod_estoque;
    }

    // BUSCAR POR NOME E PERÍODO
    public function searchavanced(Request $request)
    {
        $filters = $request->all();
        $request->flash();
        $mod_estoque = $this->filtroAvanced($request->input('nome_prod_avanced'), $request->input('data_inicial_avanced'), $request->input('data_final_avanced'));
        return view('/modificacao_estoque', compact('mod_estoque', 'filters'));
    }

    public function filtroAvanced($nome_produto, $data_inicial, $data_final)
    {
        $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', '%' . $nome_produto . '%')
            ->whereBetween('data', ["{$data_inicial}", "{$data_final}"])->paginate();
        return $mod_estoque;
    }

    // PDF

    public function gerarPDF(Request $request)
    {
        $opc_relatorio = old('opc_rel_estoque');

        switch ($opc_relatorio) {
            case 'relatorio_nome_produto':
                $nome = old('filtro_name_prod');
                $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', '%' . old('filtro_name_prod') . '%')->get();
                break;
            case 'relatorio_periodo_date':
                $mod_estoque = ModificacaoEstoque::whereBetween('data', [old('data_inicial'), old('data_final')])->get();
                break;
            case 'relatorio_periodo_avanced':
                $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', '%' . old('nome_prod_avanced') . '%')
                    ->whereBetween('data', [old('data_inicial_avanced'), old('data_final_avanced')])->get();
                break;
            default:
                $mod_estoque = ModificacaoEstoque::all();
                break;
        }

        $pdf = PDF::loadView('pdf', compact('mod_estoque'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf');
    }
}
