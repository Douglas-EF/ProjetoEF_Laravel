<?php
require_once 'php/conexao.php';

require_once 'php/includes/header.php';

if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM lista WHERE id_list = '$id'";

    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_assoc($resultado);
}

?>
</head>

<?php
require_once 'php/includes/top.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light white-text">Edição de Cliente</h3>
        <form action="php/php_action/func_compra/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id_list'] ?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome_list'] ?>" class="white-text">
            </div>

            <div class="input-field col s12">
                <input type="text" name="data_inicial" id="data_inicial"  value="<?php echo $dados['data_inicial_list'] ?>" class="white-text">
            </div>

            <div class="input-field col s12">
                <input type="text" name="data_final" id="data_final" value="<?php echo $dados['data_final_list'] ?>" class="white-text">
            </div>

            <button type="submit" name="btn_atualizar" class="btn">Atualizar</button>
            <a href="compra.php" type="button" class="btn green">LISTAS DE COMPRA</a>

        </form>
    </div>
</div>


<?php
require_once 'php/includes/footer.php';
?>