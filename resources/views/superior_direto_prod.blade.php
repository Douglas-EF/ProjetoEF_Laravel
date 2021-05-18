@extends('layouts.main')

@section('title', 'EF - Superior Direto')

@section('css', '/css/menu_sd.css')

@section('content')
<nav class="menu">
    <ul>
        <li><a href="#">Produtos para avaliação</a></li>
        <li><a href="superior_direto_cot.php">Cotações&nbsp;para&nbsp;avaliação</a></li>
    </ul>
</nav>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Cotações&nbsp;para&nbsp;Avaliação</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="white-text">Nome&nbsp;da&nbsp;Lista</th>
                    <th class="white-text">Nome&nbsp;da&nbsp;Item</th>
                    <th class="white-text">Quantidade</th>
                </tr>
            </thead>
            <!-- $sql = "SELECT * FROM itens_lista INNER JOIN lista ON lista.id_list = itens_lista.fk_id_list AND itens_lista.fk_avaliacao_sd = 1 AND itens_lista.fk_ativacao = true" -->

            <tbody>
                <tr>
                    <td>{}</td>
                    <td>{}</td>
                    <td>{}</td>
                    <td><button class="btn-floating waves-effect waves-light orange"><i class="material-icons">done</i></button></td>
                    <td><a class="btn-floating waves-effect waves-light modal-trigger red"><i class="material-icons">clear</i></a></td>
                </tr>
            </tbody>

        </table>
    </div>
</div>
@endsection