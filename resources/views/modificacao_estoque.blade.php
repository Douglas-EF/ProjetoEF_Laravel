@extends('layouts.main')

@section('title', 'Modificações no Estoque')

@section('css', '/css/style.css')

@section('content')
<a href="{{ route('estoque.index') }}" class="btn waves-effect blue-grey"><i class="material-icons" title="Voltar"><img src="/img/voltar.png"></i></a>

<form action="{{ route('modificacao_estoque.gerarpdf') }}" target="_blank" method="get">
    <button class="btn waves-effect orange"><i class="material-icons" title="Gerar PDF">picture_as_pdf</i></button>
</form>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Modificações&nbsp;no&nbsp;estoque&nbsp;<a href="{{route('modificacao_estoque.index')}}"><img src="/img/recarregar.png" title="Recarregar página"></a></h3>


        <button id="show_hide_one" class="btn waves-effect black-text cyan">PESQUISAR POR NOME</button>
        <button id="show_hide_two" class="btn waves-effect black-text cyan">PESQUISAR POR PERÍODO</button>
        <button id="show_hide_three" class="btn waves-effect black-text cyan">PESQUISA AVANÇADA</button>

        <!--| FORMLULÁRIO PARA PESQUISAR PRODUTO POR NOME |-->
        <div id="form_one" class="row">
            <form action="{{route('modificacao_estoque.searchname')}}" method="GET">
                <div class="input-field col s8">
                    <input type="text" name="filtro_name_prod" value="{{old('filtro_name_prod')}}" placeholder="Informe o nome do produto...">
                </div>
                <input type="hidden" id="opc_rel_estoque" name="opc_rel_estoque" value="relatorio_nome_produto">
                <button id="btn_submit_one" class="btn-floating" type="submit"><i class="material-icons">search</i></button>

            </form>
        </div>

        <!--| FORMLULÁRIO PARA PESQUISAR PRODUTO POR PERÍODO |-->
        <div id="form_two" class="row">
            <form action="{{ route('modificacao_estoque.searchdate') }}" method="GET">
                <div class="input-field col s4">
                    <input type="date" value="{{old('data_inicial')}}" name="data_inicial">
                </div>
                <div class="input-field col s4">
                    <input type="date" value="{{old('data_final')}}" name="data_final">
                </div>
                <input type="hidden" id="opc_rel_estoque" name="opc_rel_estoque" value="relatorio_periodo_date">
                <button id="btn_submit_two" class="btn-floating" type="submit"><i class="material-icons">search</i></button>
            </form>
        </div>

        <!--| FORMULÁRIO PARA PESQUISAR MODIFICACÕES POR PRODUTO E PERÍODO |-->
        <div id="form_three" class="row">
            <form action="{{ route('modificacao_estoque.searchavanced') }}" method="GET">
                <div class="input-field col s4">
                    <input type="text" value="{{ old('nome_prod_avanced') }}" name="nome_prod_avanced" placeholder="Nome do produto...">
                </div>
                <div class="input-field col s4">
                    <input type="date" value="{{old('data_inicial_avanced')}}" name="data_inicial_avanced">
                </div>
                <div class="input-field col s4">
                    <input type="date" value="{{old('data_final_avanced')}}" name="data_final_avanced">
                </div>
                <input type="hidden" id="opc_rel_estoque" name="opc_rel_estoque" value="relatorio_periodo_avanced">
                <button id="btn_submit_three" class="btn-floating" type="submit"><i class="material-icons">search</i></button>
            </form>
        </div>

        <table class="striped">
            <thead>
                <tr>
                    <th>Nome&nbsp;do&nbsp;Produto</th>
                    <th>Nome&nbsp;do&nbsp;Usuário</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Quantidade&nbsp;anterior</th>
                    <th>Quantidade&nbsp;modificada</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mod_estoque as $dados)
                <tr>
                    <td>{{ $dados->nome_produto }}</td>
                    <td>{{$dados->nome_usuario}}</td>
                    <td>{{$dados->data->format('d/m/Y')}}</td>
                    <td>{{$dados->hora}}</td>
                    <td>{{$dados->quantidade_anterior}}</td>
                    <td>{{$dados->quantidade_modificada}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    /*
    $("#btn_submit_one").click(function(event) {
        //event.preventDefault();
        $("#opc_relatorio").val('relatorio_nome_produto');
    });
    $("#btn_submit_two").click(function(event) {
        //event.preventDefault();
        $("#opc_relatorio").val('relatorio_periodo_date');
    });*/

    var btn_one = document.querySelector('#show_hide_one');
    var btn_two = document.querySelector('#show_hide_two');
    var btn_three = document.querySelector('#show_hide_three');

    var container_one = document.querySelector('#form_one');
    var container_two = document.querySelector('#form_two');
    var container_three = document.querySelector('#form_three');

    container_one.style.display = 'none';
    container_two.style.display = 'none';
    container_three.style.display = 'none';



    btn_one.addEventListener('click', function() {
        if (container_two.style.display == 'block' || container_three.style.display == 'block') {
            container_two.style.display = 'none';
            container_three.style.display = 'none';
        } else if (container_one.style.display === 'block') {
            container_one.style.display = 'none';
        } else {
            container_one.style.display = 'block';
        }
    });

    btn_two.addEventListener('click', function() {
        if (container_one.style.display == 'block' || container_three.style.display == 'block') {
            container_one.style.display = 'none';
            container_three.style.display = 'none';
        } else if (container_two.style.display === 'block') {
            container_two.style.display = 'none';
        } else {
            container_two.style.display = 'block';
        }
    });

    btn_three.addEventListener('click', function() {
        if (container_one.style.display == 'block' || container_two.style.display == 'block') {
            container_one.style.display = 'none';
            container_two.style.display = 'none';
        } else if (container_three.style.display === 'block') {
            container_three.style.display = 'none';
        } else {
            container_three.style.display = 'block';
        }
    });

    if (isset(btn_one.addEventListener('click'))) {
        container_two.style.display = 'none';
    }
</script>
@endsection