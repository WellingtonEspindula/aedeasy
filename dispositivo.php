<?php
ini_set("display_errors", 1);

require_once 'model/Dispositivo.php';
require_once 'model/EntradaDispositivo.php';

$model = new Dispositivo();
$model = $model->getDispositivo($_GET["id"]);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AedesEasy</title>


        <!-- Custom styling plus plugins -->
        <link href="admin/assets/css/custom.css" rel="stylesheet">
        <link href="admin/assets/css/icheck/flat/green.css" rel="stylesheet">
        <link href="admin/assets/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">


        <!-- Bootstrap core CSS -->

        <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin/assets/css/global.css" rel="stylesheet">

        <link href="admin/assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="admin/assets/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="admin/assets/css/custom.css" rel="stylesheet">
        <link href="admin/assets/css/icheck/flat/green.css" rel="stylesheet">


        <script src="admin/assets/js/jquery.min.js"></script>
        <link href="admin/assets/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <link href="admin/assets/css/editor/index.css" rel="stylesheet">
        <link href="admin/assets/css/select/select2.min.css" rel="stylesheet">

        <script src="admin/assets/js/tags/jquery.tagsinput.min.js"></script>
        <script src="admin/assets/js/select/select2.full.js"></script>
        <script src="admin/assets/js/bootstrap.min.js"></script>
        <script src="admin/assets/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="admin/assets/js/editor/external/jquery.hotkeys.js"></script>
        <script src="admin/assets/js/editor/external/google-code-prettify/prettify.js"></script>


        <style>
            #map {
                height: 400px;
                width: 400px;
            }
        </style>
        <script>
            function initMap() {
                var uluru = {lat: <?= $model->getLocalizacao_x() ?>, lng: <?= $model->getLocalizacao_y() ?>};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVwu5kgeer0jmgnuvIjfOQBljocQ-Oq3A&callback=initMap">
        </script>

    </head>


    <body class="nav-md pace-running">
        <div class="pace pace-active">
            <div class="pace-progress" style="transform: translate3d(99.8065%, 0px, 0px);" data-progress-text="99%"
                 data-progress="99">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>

        <div class="container body">
            <!--page content -->
            <div role = "main" style = "min-height: 691px;">
                <div class = "x_content">
                    <div class="x_panel">
                        <div>
                            <a href = "index.php"><i style = "font-size: 20px;" class = "fa fa-chevron-left"></i> Voltar</a>
                        </div>
                        <div class="pull-left" style="padding-right: 20px; padding-top: 10px;">
                            <div id="map"></div>

                        </div>
                        <h3>Dispositivo de código <?= $model->getIddispositivo() ?></h3>
                        <?php
                        require_once 'model/EntradaDispositivo.php';

                        $entry = new EntradaDispositivo();
                        $entry = $entry->getLastEntradaByDispositivo($_GET["id"]);

                        if (is_a($entry, 'EntradaDispositivo')) {
                            if ($entry->getCondutividade() > 100) {
                                echo "<h4><span class='label label-warning'>Risco potencilamente alto de contaminação </span></h4>";
                            } else {
                                echo '<h4><span class="label label-success">Não existe contaminação </span></h4>';
                            }
                        } else {
                            echo '<h4><span class="label label-default">Nenhum valor foi inserido até o momento</span></h4>';
                        }
                        ?>
                        <div class="ln_solid"></div>
                        <h5>Informações:</h5>
                        <p>
                            <b>Endereço: </b><?= $model->getEndereco_comp() ?><br>
                            <b>Reponsável: </b><?= $model->getNome_resp() ?><br>
                            <b>Email Reponsável: </b><?= $model->getEmail_resp() ?><br>
                            <b>Telefone Reponsável: </b><?= $model->getTelefone_resp() ?><br>
                        </p>
                        <br><br>
                        <h5>Registros de condutividade:</h5>
                        <div style="display: inline-block; width: 485px; height: 242px">
                            <canvas id="lineChart" width="420" height="242"></canvas>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>

    </div>

    <script src="admin/assets/js/bootstrap.min.js"></script>

    <!-- bootstrap progress js -->
    <script src="admin/assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="admin/assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="admin/assets/js/icheck/icheck.min.js"></script>

    <script src="admin/assets/js/custom.js"></script>

    <script src="admin/assets/js/validator/validator.js"></script>

    <!-- pace -->
    <script src="admin/assets/js/pace/pace.min.js"></script>
    <script src="admin/assets/js/moment/moment.min.js"></script>
    <script src="admin/assets/js/chartjs/chart.min.js"></script>
    <script>
            Chart.defaults.global.legend = {
                enabled: false
            };

            // Line chart
            var ctx = document.getElementById("lineChart");
            var lineChart = new Chart(ctx, {
                type: 'line',
                options: {
                    global: {
                        responsive: false,
                        maintainAspectRatio: false
                    }
                },
<?php
$eds = (new EntradaDispositivo())->getEntradasByDispositivo($_GET["id"]);
?>
                data: {
                    labels: [
<?php
foreach ($eds as $ed) {
    echo "'" . $ed->getHora_entrada() . "', ";
}
?>
                    ],
                    datasets: [{
                            label: "Condutividade",
                            backgroundColor: "rgba(38, 185, 154, 0.31)",
                            borderColor: "rgba(38, 185, 154, 0.7)",
                            pointBorderColor: "rgba(38, 185, 154, 0.7)",
                            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointBorderWidth: 1,
                            data: [
<?php
foreach ($eds as $ed) {
    echo $ed->getCondutividade() . ", ";
}
?>
                            ]
                        }]
                },
            });


    </script>

    <div class="nicescroll-rails" id="ascrail2000"
         style="left: 225px; top: 0px; width: 5px; height: 693px; position: absolute; z-index: auto; cursor: url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize; opacity: 0;">
        <div
            style="border-radius: 5px; border: 0px solid rgb(255, 255, 255); border-image: none; top: 0px; width: 5px; height: 692px; position: relative; float: right; background-clip: padding-box; background-color: rgba(42, 63, 84, 0.35);"></div>
    </div>
    <div class="nicescroll-rails" id="ascrail2000-hr"
         style="left: 0px; top: 688px; width: 225px; height: 5px; display: none; position: absolute; z-index: auto; opacity: 0;">
        <div
            style="border-radius: 5px; border: 0px solid rgb(255, 255, 255); border-image: none; top: 0px; width: 230px; height: 5px; position: relative; background-clip: padding-box; background-color: rgba(42, 63, 84, 0.35);">

        </div>
    </div>
</body>
</html>


