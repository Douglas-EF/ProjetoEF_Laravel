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
                    <th><a href="#" class="btn-floating waves-effect waves-light blue "><i class="material-icons">add</i></a></th>
                </tr>

            </thead>

            <tbody>
                @foreach($cotacoes as $dados)
                <tr>
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->StatusAvaliacaoSD->nome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@endsection