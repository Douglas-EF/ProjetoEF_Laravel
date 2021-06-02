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
                    <th class="text"><a href="{{ route('produtos.create') }}" class="btn-floating tooltipped waves-effect waves-light blue" data-position="top" data-tooltip="Novo produto"><i class="material-icons">add</i></a></th>
                </tr>
            </thead>

            <tbody>
                @foreach($produtos as $dados)
                <tr>
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->marca}}</td>
                    <td>{{$dados->categoria}}</td>
                    <td>{{$dados->observacao}}</td>
                    <td><a href="{{ route('produtos.edit', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <form action="{{ route('produtos.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$dados->id}}">
                        <td><button type="submit" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>            
        </table>
        <hr>
            {{$produtos->links("pagination::bootstrap-4")}}</hr>
    </div>
</div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Deletar dado</h4>
        <p>Informe a quantidade que deseja adicionar ao estoque:</p><br>
        <form action="" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"><img src="/img/qtd_estoque.png"></i>
                    <input name="new_quantidade" type="text" class="validate" pattern="[0-9]+$" required>
                    <label for="btn1">Quantidade</label>
                    <input hidden name="operacao" value="soma">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btn_confirmar" class="btn waves-effect waves-light green">CONFIRMAR</button>
                <a class="btn waves-effect waves-light red modal-close">CANCELAR</a>
            </div>
        </form>
    </div>
</div>
@endsection