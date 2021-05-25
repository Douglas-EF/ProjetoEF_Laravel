<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModificacaoEstoque;
use PDF;

class PdfController extends Controller
{
    public function gerarPDF(Request $request)
    {
        //$indice = $request->input('radio_opcoes_modal');       
        
        $indice = 'relatorio_full';

        switch ($indice) {
            case 'relatorio_full':
                $mod_estoque = ModificacaoEstoque::all();
                break;

            case 'relatorio_nome_produto':
                $mod_estoque = ModificacaoEstoque::where('nome_produto', 'like', "%{$request->input('filtro_name_prod')}%");
                break;

            case 'relatorio_periodo_date':
                $mod_estoque = ModificacaoEstoque::whereBetween('data', ["{$request->input('data_inicial')}", "{$request->input('data_final')}"]);
                break;
        }

        $pdf = PDF::loadView('pdf', compact('mod_estoque'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf');
    }
}
