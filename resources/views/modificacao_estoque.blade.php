@extends('layouts.main')

@section('title', 'Modificações no Estoque')

@section('css', '/css/style.css')

@section('content')
<a href="{{ route('estoque.index') }}" class="btn waves-effect blue-grey"><i class="material-icons" title="Voltar"><img src="/img/voltar.png"></i></a>

<form action="{{ route('modificacao_estoque.gerarpdf') }}" target="_blank">
    <button class="btn waves-effect orange"><i class="material-icons" title="Gerar PDF">picture_as_pdf</i></button>
    <input id="opc_relatorio" name="opc_relatorio" value="{{ old('opc_relatorio') }}" type="hidden">
</form>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Modificações no estoque</h3>

        <!--| FORMLULÁRIO PARA PESQUISAR PRODUTO POR NOME |-->
        <button id="show_hide_one" class="btn black-text cyan">PESQUISAR POR NOME</button>
        <div id="form_one" class="row">
            <form action="{{route('modificacao_estoque.searchname')}}" method="GET">
                <div class="input-field col s8">
                    <input type="text" name="filtro_name_prod" value="{{ old('filtro_name_prod') }}" placeholder="Informe o nome do produto...">
                    <button id="btn_submit_one" class="btn" type="submit"><i class="material-icons">search</i></button>
                </div>
            </form>
        </div>

        <!--| FORMLULÁRIO PARA PESQUISAR PRODUTO POR PERÍODO |-->
        <button id="show_hide_two" class="btn black-text cyan">PESQUISAR POR PERÍODO</button>
        <div id="form_two" class="row">
            <form action="{{ route('modificacao_estoque.searchdate') }}" method="POST">
                @csrf
                <div class="input-field col s4">
                    <input type="date" value="2021-01-10" name="data_inicial">
                    <button id="btn_submit_two" class="btn" type="submit"><i class="material-icons">search</i></button>
                </div>
                <div class="input-field col s4">
                    <input type="date" value="2021-05-20" name="data_final">
                </div>
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
    var btn_submit_one = document.querySelectorAll("#btn_submit_one");
    var btn_submit_two = document.querySelectorAll("#btn_submit_two");

    $("#btn_submit_one").click(function(event) {
        //event.preventDefault();
        $("#opc_relatorio").val('relatorio_nome_produto');
    });

    $("#btn_submit_two").click(function(event) {
        //event.preventDefault();
        $("#opc_relatorio").val('relatorio_periodo_date');
    });

    var btn_one = document.querySelector('#show_hide_one');
    var container_one = document.querySelector('#form_one');
    var btn_two = document.querySelector('#show_hide_two');
    var container_two = document.querySelector('#form_two');
    container_one.style.display = 'none';
    container_two.style.display = 'none';



    btn_one.addEventListener('click', function() {
        if (container_one.style.display === 'block') {
            container_one.style.display = 'none';
        } else {
            container_one.style.display = 'block';
        }

    });
    btn_two.addEventListener('click', function() {
        if (container_two.style.display === 'block') {
            container_two.style.display = 'none';
        } else {
            container_two.style.display = 'block';
        }

    });
</script>
@endsection