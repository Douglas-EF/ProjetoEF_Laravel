@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light">Cadastrar item</h3>
        <form action="{{ route('item_cotacao.store') }}" method="POST">
            @csrf
            <div class="input-field col s12">
                <select name="produto">
                    <option selected disabled>Escolha um produto</option>
                    @foreach($lista->compra->itens_lista_compra as $dados)
                    <option value="{{$dados->nome}}">{{$dados->nome}}</option>
                    @endforeach
                </select>
                <label>Produto</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="fornecedor" required>
                <label for="fornecedor">Fornecedor</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="caracteristica" required>
                <label for="caracteristica">Característica</label>
            </div>

            <div class="input-field col s6">
                <input type="number" name="form_pag_avista" required>
                <label for="form_pag_avista">Pagamento a vista</label>
            </div>

            <div class="input-field col s6">
                <input type="number" name="form_pag_aprazo" required>
                <label for="form_pag_aprazo">Pagamento a vista</label>
            </div>
            <input type="hidden" name="cotacao_id" value="{{ $lista->id }}">

            <button class="btn green" type="submit">CADASTRAR</button>
            <button class="btn red" type="reset">CANCELAR</button>
        </form>
    </div>
</div>
@endsection