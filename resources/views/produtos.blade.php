@extends('layouts.main')

@section('title', 'Produtos')

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
                    <th></th>
                    <th class="text"><a href="{{ route('produtos.create') }}" class="btn-floating waves-effect waves-light blue"><i class="material-icons">add</i></a></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($produtos as $dados)
                <tr>
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->marca}}</td>
                    <td>{{$dados->categoria}}</td>
                    <td>{{$dados->observacao}}</td>
                    <td><a href="{{ $dados->id }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ $dados->id }}" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection