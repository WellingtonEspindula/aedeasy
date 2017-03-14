<?php
require_once(dirname(__FILE__) . "./../model/Usuario.php");


if (isset($_POST["log"])) {
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]);
    
    var_dump($senha);

    $usuario = new Usuario();
    $usuario = $usuario->autentica($login, $senha);

    if ($usuario != false) {
        session_start();
        $_SESSION["logado"] = "true";
        header("Location: views/dispositivos/index.php");
    } else {
        header("Location: login.php?erro='true'");
    }
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Admin</title>

            <!-- Bootstrap core CSS -->

            <link href="assets/css/bootstrap.min.css" rel="stylesheet">

            <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
            <link href="assets/css/animate.min.css" rel="stylesheet">

            <!-- Custom styling plus plugins -->
            <link href="assets/css/custom.css" rel="stylesheet">
            <link href="assets/css/icheck/flat/green.css" rel="stylesheet">


            <script src="assets/js/jquery.min.js"></script>

            <!--[if lt IE 9]>
                  <script src="../assets/js/ie8-responsive-file-warning.js"></script>
                  <![endif]-->

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                  <![endif]-->

        </head>

        <body style="background:#F7F7F7;">

            <div class="">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>

                <div id="wrapper">

                    <!--        LOGIN         -->
                    <div id="login" class="animate form">
                        <section class="login_content">
                            <form action="" method="post">
                                <h1>Login</h1>
                                <div>
                                    <input type="text" class="form-control" name="login" placeholder="Username" required="" />
                                </div>
                                <div>
                                    <input type="password" class="form-control" name="senha" placeholder="Password" required="" />
                                </div>
                                <?php
                                if ($_GET['erro'] == true) {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Erro:</span>
                                        O login/senha estão incorretos
                                    </div>
                                    <?php
                                }
                                ?>
                                <div>
                                    <button type="submitt" class="btn" name="log" value="true">Login
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h2><i class="fa fa-book" style="font-size: 26px;"></i> Desenvolvido por Wildcats</h2>
                                </div>
                            </form>
                            <!-- form -->
                        </section>
                        <!-- content -->
                    </div>


                    

                </div>
            </div>

        </body>

    </html>

    <?php
}
?>
