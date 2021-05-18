@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<div class="dashboard">
    <div class="botoes_row0">
        <a class="row_0" id="btn_superior_direto" href="/superior_direto"> <br> <img src="img/superior_direto.png" class="img"> <br> SUPERIOR&nbsp;DIRETO</a>
        <a class="row_0" id="btn_produtos" href="/produtos"> <br> <img src="img/produto.png"> <br> PRODUTOS</a>
        <a class="row_0" id="btn_estoque" href="/estoque"> <br><img src="img/stock.png"> <br>ESTOQUE</a>
    </div>

    <div class="botoes_row1">
        <a class="row_1" id="btn_compra" href="/compra"><br> <img src="img/buy.png" class="img"><br>COMPRA</a>
        <a class="row_1" id="btn_controle" href="/controles"> <br><img src="img/controle.png" class="img"> <br> CONTROLE</a>
        <a class="row_1" id="btn_cotacao" href="/cotacoes"><br> <img src="img/cotacao.png" class="img"> <br> COTAÇÃO</a>
    </div>
</div>
@endsection