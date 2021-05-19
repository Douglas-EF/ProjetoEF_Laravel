@extends('layouts.main')

@section('title', 'EF - Listas de compra')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Listas de compra</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Nome da Lista</th>
                    <th class="text">Data inicial</th>
                    <th class="text">Data final</th>
                    <th colspan="2"></th>
                    <th><a href="{{route('compra.create')}}" class="btn-floating btn-midiun waves-effect waves-light blue"><i class="material-icons" title="Nova lista de compra">add</i></a></th>

                </tr>
            </thead>
            <tbody>
                @foreach($listas as $dados)
                <tr>
                    <td>{{ $dados->nome }}</td>
                    <td>{{ $dados->data_inicial }}</td>
                    <td>{{ $dados->data_final }}</td>
                    <td><a href="#" class="btn-floating waves-effect waves-light blue-grey"><i title="Abrir lista de compra"><img src="/img/open_list.png"></i></a></td>
                    <td><a href="{{ route('compra.edit'), $dados->id }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('compra.delete'), $dados->id }}" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>


        </table>
    </div>
</div>

@endsection