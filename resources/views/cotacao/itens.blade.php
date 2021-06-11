@extends('layouts.main')

@section('title', 'Cotações')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Cotações</h3>

        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Produto</th>
                    <th class="text">Fornecedor</th>
                    <th class="text">Caracteristicas</th>
                    <th class="text">Pagamento&nbsp;a&nbsp;vista</th>
                    <th class="text">Pagamento&nbsp;a&nbsp;prazo</th>
                    <th class="text">Avaliação&nbsp;SD</th>
                    <th class="text"><a href="{{ route('item_cotacao.create', ['lista' => $cotacoes->id]) }}" class="btn-floating waves-effect waves-light blue"><i class="material-icons">add</i></a></th>

                </tr>
            </thead>

            <tbody>
                @foreach($cotacoes->itens_lista_cotacao as $dados)
                <tr>
                    <td>{{$dados->produto}}</td>
                    <td>{{$dados->fornecedor}}</td>
                    <td>{{$dados->caracteristicas}}</td>
                    <td>{{$dados->form_pag_avista}}</td>
                    <td>{{$dados->form_pag_aprazo}}</td>
                    <td>{{$cotacoes->status_avaliacao_sd->nome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@endsection