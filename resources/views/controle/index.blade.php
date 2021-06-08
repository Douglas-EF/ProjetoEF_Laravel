@extends('layouts.main')

@section('title', 'Listas de Controle')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Listas de controle</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="text">Nome da Cotação</th>
                    <th class="text">Data inicial</th>
                    <th class="text">Data final</th>
                    <th colspan="2"></th>
                    <th class="text"><a href="{{route('controles.create')}}" class="btn-floating waves-effect waves-light blue"><i class="material-icons">add</i></a></th>
                </tr>
            </thead>

            <tbody>
                @foreach($ListaControles as $dados)
                <tr data-id="{{$dados->id}}">
                    <td>{{$dados->nome}}</td>
                    <td>{{$dados->data_inicial->format('d/m/Y') }}</td>
                    <td>{{$dados->data_final->format('d/m/Y')}}</td>
                    <td><a href="" class="btn-floating waves-effect waves-light blue-grey"><i title="Abrir lista de controle"><img src="/img/open_list.png"></i></a></td>
                    <td><a href="{{ route('controles.edit', ['id' => $dados->id]) }}" class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a></td>
                    <td><a class="btn-floating red modal-trigger waves-effect waves-light" data-target="modal"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h5>EXCLUIR LISTA DE CONTROLE</h5>
        <p>Tem certeza que deseja excluir esta lista de controle?</p><br>
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
        $('.modal form').attr('action', '/controles/destroy/' + $(this).data('id'));
    });
</script>

@endsection