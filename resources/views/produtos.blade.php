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
                <tr data-id="{{ $dados->id }}">
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->marca}}</td>
                    <td>{{$dados->categoria}}</td>
                    <td>{{$dados->observacao}}</td>
                    <td><a href="{{ route('produtos.edit', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a class="btn-floating waves-effect waves-light red modal-trigger" id="diminui-estoque" data-target="modal"><i class="material-icons">delete</i></a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{$produtos->links("pagination::bootstrap-4")}}
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h5>EXCLUIR PRODUTO</h5>
        <p>Tem certeza que deseja excluir este produto?</p><br>
        <form method="POST">
            @csrf
            <div class="modal-footer">
                <button type="submit" name="btn_confirmar" class="btn waves-effect waves-light red">CONFIRMAR</button>
                <a class="btn waves-effect waves-light green modal-close">CANCELAR</a>
            </div>
        </form>
    </div>
</div>
<style>
    .modal {
        width: 40% !important;
        height: 32% !important;
    }

    
</style>

<script>
    $("tr").click(function() {
        $('.modal form').attr('action', '/produtos/destroy/' + $(this).data('id'));
    });

    $(document).ready(function() {
        $('.modal').modal();
    });
</script>
@endsection