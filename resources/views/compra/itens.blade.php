@extends('layouts.main')

@section('title', 'Listas de compra')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Detalhes: {{$compra->nome}} </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Nome</th>
                    <th class="text">Quantidade</th>
                    <th class="text">Fornecedor</th>
                    <th class="text">Valor</th>
                    <th class="text">Categoria</th>
                    <th></th>
                    <th><a href="{{route('item_compra.create', ['lista' => $compra->id] )}}" class="btn-floating btn-midiun waves-effect waves-light blue"><i class="material-icons" title="Novo produto">add</i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($compra->itens_lista_compra->where('ativo_id', '1') as $dados)
                <tr data-id="{{$dados->id}}">
                    <td>{{ $dados->nome }}</td>
                    <td>{{ $dados->quantidade}}</td>
                    <td>{{ $dados->fornecedor }}</td>
                    <td>{{ $dados->valor }}</td>
                    <td>{{ $dados->categoria }}</td>
                    <td><a href="{{ route('item_compra.edit', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a class="btn-floating red modal-trigger waves-effect waves-light" data-target="modal"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h5>EXCLUIR PRODUTO</h5>
        <p>Tem certeza que deseja excluir este produto desta lista({{$compra->nome}})?</p><br>
        <form method="POST">
            @csrf
            <div class="modal-footer">
                <button type="submit" name="btn_confirmar" class="btn waves-effect waves-light red">CONFIRMAR</button>
                <a class="btn waves-effect waves-light green modal-close">CANCELAR</a>
            </div>
        </form>
    </div>
</div>

<script>
    $("tr").click(function() {
        $('.modal form').attr('action', '/compras/item/destroy/' + $(this).data('id'));
    });
</script>

@endsection