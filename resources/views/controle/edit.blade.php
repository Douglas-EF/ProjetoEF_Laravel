@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Lista de Controle</h3>
        <form action="{{ route('controles.update', ['id' => $controle->id]) }}" method="POST">
            @csrf
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="{{$controle->nome}}" required>
                <label for="nome">Nome da Lista</label>
            </div>

            <div class="input-field col s11">
                <input type="date" name="data_inicial" id="data_inicial" value="{{ $controle->data_inicial->format('Y-m-d')}}" required>
                <label for="data_inicial">Data Inicial</label>
            </div>

            <div class="input-field col s11">
                <input type="date" name="data_final" id="data_final" value="{{$controle->data_final->format('Y-m-d')}}" required>
                <label for="data_final">Data Final</label>
            </div>

            <button class="btn green" type="submit">ATUALIZAR</button>
            <a href="{{ route('controles.index') }}" class="btn red">CANCELAR</a>

        </form>
    </div>

</div>

</form>
@endsection