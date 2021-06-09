@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Adicionar produto</h3>
        <form action="{{ route('item_compra.store') }}" method="POST">
            @csrf
            <input type="hidden" name="lista_compra_id" value="{{ $lista->id }}">
            <div class="input-field col s12">
                <input type="text" name="nome" required>
                <label for="nome">Nome do produto</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="fornecedor">
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
                <input type="number" name="quantidade" min="1" pattern="[0-9]+$" required>
                <label for="quantidade">Quantidade</label>
            </div>

            <div class="input-field col s4">
                <input type="number" step="any" name="valor" required>
                <label for="valor">Valor</label>
            </div>
                
            <button class="btn green" type="submit">CADASTRAR</button>
            <button class="btn red" type="reset">CANCELAR</button>
            <a class="btn" href="{{ route('compras.show', ['id' => $lista->id]) }}">VOLTAR</a>

        </form>
    </div>

</div>

</form>
@endsection