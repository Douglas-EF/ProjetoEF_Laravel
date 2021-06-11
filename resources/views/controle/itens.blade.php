@extends('layouts.main')

@section('title', 'Listas de compra')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Detalhes: {{$controle->nome}} </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Razão&nbsp;Social</th>
                    <th class="text">CNPJ</th>
                    <th class="text">Vencimento&nbsp;do&nbsp;Boleto</th>
                    <th class="text">Valor</th>
                    <th class="text">Situação</th>
                    <th></th>
                    <th><a href="{{ route('item_controle.create', ['lista' => $controle->id]) }}" class="btn-floating btn-midiun waves-effect waves-light blue"><i class="material-icons" title="Nova lista de compra">add</i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($controle->itens_lista_controle->where('ativo_id', '1') as $dados)
                <tr data-id="{{$dados->id}}">
                    <td>{{ $dados->razao_social }}</td>
                    <td>{{ $dados->cnpj}}</td>
                    <td>{{ $dados->vencimento_boleto->format('d/m/Y') }}</td>
                    <td>{{ $dados->valor }}</td>
                    <td>{{ $dados->situacao }}</td>
                    <td><a href="{{ route('item_controle.edit', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a class="btn-floating red modal-trigger waves-effect waves-light" data-target="modal"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h5>EXCLUIR ITEM</h5>
        <p>Tem certeza que deseja excluir este item da lista({{$controle->nome}})?</p><br>
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
        $('.modal form').attr('action', '/controles/item/destroy/' + $(this).data('id'));
    });
</script>

@endsection