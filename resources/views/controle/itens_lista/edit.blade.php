@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Atualizar produto</h3>
        <form action="{{ route('item_controle.update', ['id' => $item->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="lista_controle_id" value="{{ $item->lista_controle_id }}">
            <div class="input-field col s12">
                <input type="text" name="razao_social" value="{{$item->razao_social}}" required>
                <label for="razao_social">Razão Social</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="cnpj" value="{{$item->cnpj}}">
                <label for="cnpj">CNPJ</label>
            </div>

            <div class="input-field col s4">
                <input type="text" name="valor" value="{{$item->valor}}" required>
                <label for="valor">Valor</label>
            </div>

            <div class="input-field col s4">
                <input type="date" name="vencimento_boleto" value="{{$item->vencimento_boleto}}" required>
                <label for="data_vencimento">Data de Vencimento</label>
            </div>

            <div class="input-field col s4">
                <select name="situacao">
                    <option disabled>Escolha um opção</option>
                    <option value="pago" selected>Pago</option>
                    <option value="vencido">Vencido</option>
                </select>
                <label>Situação</label>
            </div>

            <button class="btn green" type="submit">ATUALIZAR</button>
            <a href="{{ route('controles.show', ['id' => $item->lista_controle_id])}}" class="btn red">CANCELAR</a>
        </form>
    </div>

</div>

</form>
@endsection