@extends('layouts.main')

@section('title', 'Dashbord')

@section('css', '/css/style.css')

@section('content')
<nav class="menu">
    <ul>
        <li><a href="superior_direto_prod.php">Produtos para avaliação</a></li>
        <li><a href="#">Cotações para avaliação</a></li>
    </ul>
</nav>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light white-text">Produtos para Avaliação</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th class="white-text">Nome da Cotação</th>
                    <th class="white-text">Status da Avaliação</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM cotacao INNER JOIN avaliacao_sd_cota ON cotacao.fk_avaliacao_sd_cota = 2 WHERE avaliacao_sd_cota.id_aval_sd_cota = 2";

            $resultado = mysqli_query($connect, $sql);

            while ($dados = mysqli_fetch_array($resultado)) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $dados['nome_cota']; ?></td>
                        <td><?php echo $dados['nome_aval_sd_cota']; ?></td>
                        <td><a class="btn-floating orange"><i class="material-icons">dvr</i></a></td>
                    </tr>
                </tbody>

            <?php
            endwhile;
            ?>
        </table>
    </div>
</div>

</body>
@endsection