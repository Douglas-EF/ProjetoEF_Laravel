@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 id="title" class="light text">Editar Lista de Compra</h3>
        <form action="{{route('compras.update', ['id' => $compra->id])}}" method="POST">
            @csrf
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="{{ $compra->nome }}" required>
                <label for="nome">Nome da Lista</label>
            </div>

            <div class="input-field col s11">
                <input type="date" name="data_inicial" id="data_inicial" value="{{ $compra->data_inicial->format('Y-m-d') }}" required>
                <label for="data_inicial">Data Inicial</label>
            </div>

            <div class="input-field col s11">
                <input type="date" name="data_final" id="data_final" value="{{ $compra->data_final->format('Y-m-d') }}" required>
                <label for="data_final">Data Final</label>
            </div>

            <button class="btn green" type="submit">ATUALIZAR</button>
            <a href=" {{ route('compras.index') }} " class="btn red">CANCELAR</a>
        </form>
    </div>
</div>
</form>
@endsection