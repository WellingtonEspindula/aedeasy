<?php

require_once '../../../model/Usuario.php';
$user = new Usuario();
$id = $_GET["id"];
$user->excluir($id);
header("Location: index.php");
?>
