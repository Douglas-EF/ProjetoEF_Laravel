@extends('layouts.main')

@section('title', 'Modificações no Estoque')

@section('css', '/css/style.css')

@section('content')
<a href="{{route('estoque.index')}}" class="btn waves-effect blue-grey"><i class="material-icons" title="Voltar"><img src="/img/voltar.png"></i></a>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Modificações no estoque</h3>
        <div class="row">
            <form action="{{route('modificacao_estoque.searchname')}}" method="post">
                @csrf
                <div class="input-field col s8">
                    <i class="material-icons prefix">search</i>
                    <input type="text" name="filtro_name_prod" placeholder="Informe o nome do produto...">
                </div>
            </form>
        </div>


        <form action="" method="POST">
            @csrf
            <div class="input-field col s4">
                <i class="material-icons prefix small">date_range</i>
                <input type="date" name="data_inicial">
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix small">date_range</i>
                <input type="date" name="data_final">
            </div>

        </form>

        <table class="striped">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Nome do Usuário</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Quantidade anterior</th>
                    <th>Quantidade modificada</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mod_estoque as $dados)
                <tr>
                    <td>{{ $dados->nome_produto }}</td>
                    <td>{{$dados->nome_usuario}}</td>
                    <td>{{$dados->data}}</td>
                    <td>{{$dados->hora}}</td>
                    <td>{{$dados->quantidade_anterior}}</td>
                    <td>{{$dados->quantidade_modificada}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<a class="btn waves-effect waves-light" href="{{route('estoque.index')}}"><i class="material-icons left"><img src="/img/voltar.png"></i>VOLTAR</a>

@endsection