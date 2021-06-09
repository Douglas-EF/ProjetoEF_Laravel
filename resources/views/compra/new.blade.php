@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Criar Lista de Compra</h3>
        <form action="{{route('compras.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s10">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome">Nome da Lista</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input type="date" name="data_inicial" id="data_inicial" required>
                    <label for="data_inicial">Data Inicial</label>
                </div>
            </div>

            <div class="row">
            <div class="input-field col s4">
                <input type="date" name="data_final" id="data_final" required>
                <label for="data_final">Data Final</label>
            </div>
            </div>

            <button class="btn green" type="submit">CADASTRAR</button>
            <button class="btn red" type="reset">CANCELAR</button>
            <a class="btn" href="{{ route('compras.index') }}">VOLTAR</a>
            

        </form>
    </div>

</div>

</form>
@endsection