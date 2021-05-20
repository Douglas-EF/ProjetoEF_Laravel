@extends('layouts.main')

@section('title', 'Estoque')

@section('css', '/css/style.css')

@section('content')
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Estoque dos produtos</h3>

        <form action="{{ route('estoque.search') }}" method="POST">
            @csrf
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" name="filtro" placeholder="Informe o nome do produto...">
            </div>
        </form>

        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text">Nome do Produto</th>
                    <th class="text">Quantidade</th>
                    <th></th>
                    <th class="text"><a href="{{route('modificacaoestoque.index')}}" class="btn-floating waves-effect waves-light blue-grey"><i title="Exibir histórico de modificações"><img src="/img/historico.png"></i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($estoque as $dados)
                <tr data-id="{{ $dados->id }}">
                    <td>{{ $dados->id }}</td>
                    <td>{{ $dados->produtos->nome }}</td>
                    <td>{{ $dados->quantidade }}</td>
                    <td><a class="btn-floating waves-effect waves-light green modal-trigger" id="aumenta-estoque" href="#modal1"><i title="Aumentar estoque"><img src="/img/up_estoque.png"></i></a></td>
                    <td><a class="btn-floating waves-effect waves-light red modal-trigger" id="diminui-estoque" data-target="modal2"><i title="Abaixar estoque"><img src="/img/down_estoque.png"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- MODAL UP ESTOQUE -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>UP Estoque</h4>
        <p>Informe a quantidade que deseja adicionar ao estoque:</p><br>
        <form action="" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"><img src="/img/qtd_estoque.png"></i>
                    <input name="new_quantidade" type="text" class="validate" required>
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

<!-- MODAL DOWN ESTOQUE(>>>>bottom-sheet<<<<) -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>DOWN Estoque</h4>
        <p>Informe a quantidade que deseja retirar do estoque:</p><br>
        <form action="" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"><img src="/img/qtd_estoque.png"></i>
                    <input name="new_quantidade" type="text" class="validate" required>
                    <label for="btn2">Quantidade</label>
                    <input hidden name="operacao" value="subtracao">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btn_confirmar" class="btn waves-effect waves-light green">CONFIRMAR</button>
                <a class="btn waves-effect waves-light red modal-close">CANCELAR</a>
            </div>
        </form>
    </div>
</div>

<script>
    $("tr").click(function() {
        $('.modal form').attr('action', '/estoque/' + $(this).data('id'));
    });

    $(document).ready(function() {
        $('.modal').modal();
    });
</script>
@endsection