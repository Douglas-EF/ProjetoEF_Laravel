@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Produtos</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Nome</th>
                    <th class="text">Marca</th>
                    <th class="text">Categoria</th>
                    <th class="text">Observação</th>
                    <th><a href="{{ route('produtos.create') }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">add</i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $dados)
                <tr>
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->marca}}</td>
                    <td>{{$dados->categoria}}</td>
                    <td>{{$dados->observacao}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection