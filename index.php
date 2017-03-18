<?php

// Iniatilize errors message to debug mode
// ini_set("display_errors", 1);


require_once 'model/Dispositivo.php';
require_once 'model/EntradaDispositivo.php';

$model = (new Dispositivo())->getDispositivos();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aedeasy</title>
        <style>
            html,
            body {
                height: 100%;
                width: 100%;
                margin: 0px;
                padding: 0px
            }
            #map {
                height: 100%;
                width: 100%;
            }
        </style>

        <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">AedEasy</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden active">
                            <a class="page-scroll" href="#"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="admin/">Administrativo</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div id="map"></div>
        <script>
            function initMap() {
                var infowindow = new google.maps.InfoWindow();
                var bounds = new google.maps.LatLngBounds();


                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -29.9037, lng: -50.2578},
                    zoom: 12
                });
<?php
require_once 'model/EntradaDispositivo.php';

foreach ($model as $value) {
    $entry = new EntradaDispositivo();
    $entry = $entry->getLastEntradaByDispositivo($value->getIddispositivo());
    $marker = "marker" . $value->getIddispositivo();


    echo "var $marker = new google.maps.Marker({   ";
    echo "position: {lat: " . $value->getLocalizacao_x() . ", lng: " . $value->getLocalizacao_y() . "}, ";
    echo "map: map";
    echo "});";

    echo "bounds.extend($marker.position);";

    echo "google.maps.event.addListener($marker, 'click', function() {   ";
    echo "infowindow.setContent('";
    echo "<h2>Sensor " . $value->getIddispositivo() . "</h2>";
    if (is_a($entry, 'EntradaDispositivo')) {
        if ($entry->getCondutividade() > 100) {
            echo '<h4><span class="label label-warning">Risco potencilamente alto de contaminação </span></h4>';
        } else {
            echo '<h4><span class="label label-success">Não existe contaminação </span></h4>';
        }
    } else {
        echo '<h4><span class="label label-default">Nenhum valor foi inserido até o momento</span></h4>';
    }
    echo '<a style="text-align: right;" href="dispositivo.php?id=' . $value->getIddispositivo() . '">Mais informações</a>';
    echo "');";
    echo "infowindow.open(map,$marker);";
    echo "});";
}

echo "map.fitBounds(bounds);"
?>
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVwu5kgeer0jmgnuvIjfOQBljocQ-Oq3A&callback=initMap">
        </script>
    </body>
</html>
