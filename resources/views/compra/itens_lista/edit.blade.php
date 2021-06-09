@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Atualizar produto</h3>
        <form action="{{ route('item_compra.update', ['id' => $item->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="lista_compra_id" value="{{ $item->id }}">
            <div class="input-field col s12">
                <input type="text" name="nome" value="{{$item->nome}}" required>
                <label for="nome">Nome do produto</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="fornecedor" value="{{$item->fornecedor}}">
                <label for="data_final">Fornecedor</label>
            </div>

            <div class="input-field col s4">
                <select name="categoria">
                    <option disabled>Escolha um opção</option>
                    <option value="Produto básico" selected>Produto básico</option>
                    <option value="Produto não corriqueiro">Produto não corriqueiro</option>
                </select>
                <label>Categoria</label>
            </div>

            <div class="input-field col s4">
                <input type="number" name="quantidade" min="1" pattern="[0-9]+$" value="{{$item->quantidade}}" required>
                <label for="quantidade">Quantidade</label>
            </div>

            <div class="input-field col s4">
                <input type="number" step="any" name="valor" value="{{$item->valor}}" required>
                <label for="valor">Valor</label>
            </div>

            <button class="btn green" type="submit">ATUALIZAR</button>
            <a href="{{ route('compras.show', ['id' => $item->lista_compra_id]) }}" class="btn red">CANCELAR</a>
        </form>
    </div>

</div>

</form>
@endsection