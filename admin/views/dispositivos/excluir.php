<?php

require_once '../../../model/Dispositivo.php';
$disp = new Dispositivo();
$id = $_GET["id"];
$disp->excluir($id);
header("Location: index.php");
?>
