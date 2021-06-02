@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Editar Produto</h3>
        <form action="{{ route('produtos.atualizar', ['id' => $produto->id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="nome" id="nome" value="{{$produto->nome}}" required>
                    <label class="active" for="nome">Nome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="marca" id="data_inicial" value="{{$produto->marca}}" required>
                    <label class="active" for="data_inicial">Marca</label>
                </div>
            </div>

            <label>Categoria</label><br>

            
            <select name="categoria" class="browser-default col s4" required>

                <option disabled selected>Escolha um opção</option>
               
                <option {{ $produto->categoria == 'Produto básico'? 'selected':''}} value="Produto básico">Produto básico</option>
                <option {{ $produto->categoria == 'Produto não corriqueiro'? 'selected':''}} value="Produto não corriqueiro">Produto não corriqueiro</option>
            </select>

            <div class="row">
                <div class="input-field col s10">
                    <input id="obs" type="text" name="observacao" value="{{$produto->observacao}}">
                    <label for="obs" class="active">Observação</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light green" type="submit" name="btn_cadastrar"><i class="material-icons left"><img src="/img/envio.png"></i>ATUALIZAR</button>
            <a class="btn waves-effect waves-light red"><i class="material-icons left"><img src="/img/cancelar.png"></i>CANCELAR</a>
            <a class="btn waves-effect waves-light" href="/produtos"><i class="material-icons left"><img src="/img/voltar.png"></i>VOLTAR</a>
        </form>
    </div>
</div>
@endsection