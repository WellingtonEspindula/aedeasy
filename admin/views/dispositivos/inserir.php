<?php
ini_set('display_errors', 1);

include_once '../static/top.php';
require_once '../../../model/Dispositivo.php';

if (isset($_POST["endereco_comp"])) {
    $model = new Dispositivo();
    $model->setEndereco_comp($_POST["endereco_comp"]);
    $model->setLocalizacao_x($_POST["localizacao_x"]);
    $model->setLocalizacao_y($_POST["localizacao_y"]);
    $model->setNome_resp($_POST["nome_resp"]);
    $model->setTelefone_resp(($_POST["telefone_resp"]));
    $model->setEmail_resp(($_POST["email_resp"]));

    if ($model->insert()) {
        redirect("index.php");
    } else {
        echo '<script language="javascript">';
        echo 'var aux = confirm("Ocorreu um erro durante a inserção do usuário!");';
        echo 'if (aux) {';
        echo '  location.href = "index.php";';
        echo '}';
        echo '</script>';
    }
} else {
    ?>
    <div class="x_panel">
        <h3> Inserir Dispositivo:</h3>
        <div class="ln_solid"></div>
        <form action="" method="POST" class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco_comp"> Endereço Completo
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="endereco_comp" type="text"
                           name="endereco_comp">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="localizacao_x"> Localização x
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="localizacao_x" type="text"
                           name="localizacao_x">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="localizacao_y"> Localização y
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="localizacao_y" type="text"
                           name="localizacao_y">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome_resp"> Nome Responsável
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="nome_resp" type="text"
                           name="nome_resp">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone_resp"> Telefone Responsável
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="telefone_resp" type="text"
                           name="telefone_resp">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_resp"> Email Responsável
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" id="email_resp" type="text"
                           name="email_resp">
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

