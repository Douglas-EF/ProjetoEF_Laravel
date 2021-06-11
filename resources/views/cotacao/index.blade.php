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
                    <th class="text">Nome da Cotação</th>
                    <th class="text">Status da Avaliação SD </th>
                </tr>
            </thead>

            <tbody>
                @foreach($cotacoes as $dados)
                <tr>
                    <td>{{$dados->nome}}</td>
                    <td></td>
                    <td><a href="{{ route('cotacoes.show', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light blue-grey tooltipped" data-position="left" data-tooltip="Abrir lista da cotação"><i><img src="/img/open_list.png"></i></a></td>
                    <td><a href="" class="btn-floating waves-effect waves-light blue tooltipped" data-position="right" data-tooltip="Enviar para avaliação do SD"><i class="material-icons">send</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@endsection