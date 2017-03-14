<?php

require __DIR__ . '/source/Jacwright/RestServer/RestServer.php';
require 'EntradaDispositivoController.php';

$server = new \Jacwright\RestServer\RestServer('debug');
$server->addClass('EntradaDispositivoController');
$server->handle();
