@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Criar Lista de Controle</h3>
        <form action="{{route('controles.store')}}" method="POST">
            @csrf
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Nome da Lista</label>
            </div>

            <div class="input-field col s10">
                <input type="date" name="data_inicial" id="data_inicial" required>
                <label for="data_inicial">Data Inicial</label>
            </div>

            <div class="input-field col s10">
                <input type="date" name="data_final" id="data_final" required>
                <label for="data_final">Data Final</label>
            </div>

            <button class="btn green" type="submit">CADASTRAR</button>
            <button class="btn red" type="reset">CANCELAR</button>
            <a class="btn" href="{{ route('controles.index') }}">VOLTAR</a>

        </form>
    </div>

</div>

</form>
@endsection