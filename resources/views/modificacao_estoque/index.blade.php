@extends('layouts.main')

@section('title', 'Modificações no Estoque')

@section('css', '/css/style.css')

@section('content')
<a href="{{ route('estoque.index') }}" class="btn waves-effect blue-grey"><i class="material-icons" title="Voltar"><img src="/img/voltar.png"></i></a>

<form method="GET" action="{{ route('modificacao_estoque.gerarpdf') }}" target="_blank" style="display: inline-block;">
    <input type="hidden" value="{{ old('nome_prod') }}" name="nome_prod" placeholder="Nome do produto...">
    <input type="hidden" value="{{ old('data_inicial') }}" name="data_inicial">
    <input type="hidden" value="{{ old('data_final') }}" name="data_final">
    <button type="submit" class="btn waves-effect orange"><i class="material-icons" title="Gerar PDF">picture_as_pdf</i></button>
</form>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Modificações&nbsp;no&nbsp;estoque&nbsp;<a id="recarregar" href="{{route('modificacao_estoque.index')}}"><img src="/img/recarregar.png" title="Limpar filtro(s)"></a></h3>

        <!--| FORMULÁRIO PARA PESQUISAR MODIFICACÕES POR PRODUTO E PERÍODO |-->
        <div id="form_three" class="row ">
            <form action="{{ route('modificacao_estoque.search') }}" method="GET" class="valign-wrapper">
                <div class="input-field col s4">
                    <input type="text" id="nome_prod" value="{{ isset($pesquisa) ? old('nome_prod') : '' }}" name="nome_prod" placeholder="Nome do produto...">
                </div>
                <div class="input-field col s3">
                    <input type="date" id="data_incial" value="{{ isset($pesquisa) ? old('data_inicial') : ''}}" name="data_inicial">
                </div>
                <div class="input-field col s3">
                    <input type="date" id="data_final" value="{{isset($pesquisa) ? old('data_final') : ''}}" name="data_final">
                </div>

                <div class="col s2">
                    <button id="btn_submit_three" class="btn-floating" type="submit"><i class="material-icons">search</i></button>
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
                @if($mod_estoque->isEmpty())
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                @else
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
                @endif
            </tbody>
        </table>
        @if(isset($filters))
        {{$mod_estoque->appends($filters)->links("pagination::bootstrap-4")}}
        @else
        {{$mod_estoque->links("pagination::bootstrap-4")}}
        @endif
    </div>
</div>
@endsection