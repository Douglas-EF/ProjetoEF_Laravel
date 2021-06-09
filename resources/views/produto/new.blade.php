@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Cadastrar Produto</h3>
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="nome" id="nome" required>
                    <label class="active" for="nome">Nome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="marca" id="data_inicial" required>
                    <label class="active" for="data_inicial">Marca</label>
                </div>
            </div>

            <label>Categoria</label><br>
            <select name="categoria" class="browser-default col s4" required>
                <option disabled>Escolha um opção</option>
                <option value="Produto básico" selected>Produto básico</option>
                <option value="Produto não corriqueiro">Produto não corriqueiro</option>
            </select>

            <div class="row">
                <div class="input-field col s10">
                    <input id="obs" type="text" name="observacao">
                    <label for="obs" class="active">Observação</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light green" type="submit"><i class="material-icons left"><img src="/img/envio.png"></i>CADASTRAR</button>
            <button type="reset" class="btn waves-effect waves-light red"><i class="material-icons left"><img src="/img/cancelar.png"></i>CANCELAR</button>
            <a class="btn waves-effect waves-light" href="/produtos"><i class="material-icons left"><img src="/img/voltar.png"></i>VOLTAR</a>
        </form>
    </div>
</div>
@endsection