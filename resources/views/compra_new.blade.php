<?php

include_once 'php/includes/header.php';

?>

<link rel="stylesheet" href="css/style.css">
<link rel="sortcut icon" href="img/logo_ef.png" type="image/png">
<title>Eficiência&nbsp;Fiscal</title>
</head>


<?php
include_once 'php/includes/top.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Criar Lista de Compra</h3>
        <form action="../php/php_action/func_compra/insert.php" method="POST">

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Nome da Lista</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="data_inicial" id="data_inicial" required>
                <label for="data_inicial">Data Inicial</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="data_final" id="data_final" required>
                <label for="data_final">Data Final</label>
            </div>

            <button class="btn green" type="submit" name="btn_cadastrar">CADASTRAR</button>
            <button class="btn red" type="submit">CANCELAR</button>
            <a href="compra.php" class="btn">VOLTAR</a>

        </form>
    </div>

</div>

</form>



<?php
include_once 'php/includes/footer.php';
?>