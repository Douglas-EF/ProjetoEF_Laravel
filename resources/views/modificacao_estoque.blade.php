@extends('layouts.main')

@section('title', 'Modificações no Estoque')

@section('css', '/css/style.css')

@section('content')
<a href="{{route('estoque.index')}}" class="btn waves-effect blue-grey"><i class="material-icons" title="Voltar"><img src="/img/voltar.png"></i></a>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Modificações no estoque</h3>

        <table class="striped">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Nome do Usuário</th>
                    <th>Data</th>
                    <th colspan="2"></th>
                    <th>Hora</th>
                    <th colspan="2"></th>
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
                    <td colspan="2"></td>
                    <td>{{$dados->hora}}</td>
                    <td colspan="2"></td>
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