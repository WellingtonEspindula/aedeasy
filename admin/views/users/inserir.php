<?php
ini_set('display_errors', 1);


require_once '../../../model/Usuario.php';

if (isset($_POST["login"])) {
    $usuario = new Usuario();
    $usuario->setLogin($_POST["login"]);
    $usuario->setSenha(md5($_POST["senha"]));
    
    
    if ($usuario->insert()) {
        header("Location: index.php");
    } else {
        echo '<script language="javascript">';
        echo 'var aux = confirm("Ocorreu um erro durante a inserção do usuário!");';
        echo 'if (aux) {';
        echo '  location.href = "index.php";';
        echo '}';
        echo '</script>';
    }
} else {
    include_once '../static/top.php';
    ?>
    <div class="x_panel">
        <h3> Inserir Usuário:</h3>
        <div class="ln_solid"></div>
        <form action="" method="POST" class="form-horizontal form-label-left">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="log"> Login
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="log" type="text"
                           name="login">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha"> Senha
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="senha" type="password"
                           name="senha">
                </div>
            </div>



            <!-- --------------------------->
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-success pull-right" type="submit">Enviar</button>
                </div>
            </div>

        </form>

    </div>

    <?php
    include_once '../static/bottom.php';
}
?>

