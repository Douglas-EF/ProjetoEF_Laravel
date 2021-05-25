<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Relatório</title>
</head>

<body>
    <img src="img/icon_ef.png" height="50px">
    <!--<input type="hidden" name="radio_opcoes_modal" value="relatorio_full">-->
    <strong class="center-align">RELATÓRIO DE MODIFICAÇÕES REALIZADAS</strong>
    <table class="striped">
        <thead>
            <tr>
                <th>Nome&nbsp;do&nbsp;Produto</th>
                <th>Nome&nbsp;do&nbsp;Usuário</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Quantidade&nbsp;anterior</th>
                <th>Quantidade&nbsp;modificada</th>
            </tr>
        </thead>

        <tbody>
            @foreach($mod_estoque as $dados)
            <tr>
                <td>{{$dados->nome_produto}}</td>
                <td>{{$dados->nome_usuario}}</td>
                <td>{{$dados->data->format('d/m/Y')}}</td>
                <td>{{$dados->hora}}</td>
                <td>{{$dados->quantidade_anterior}}</td>
                <td>{{$dados->quantidade_modificada}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>