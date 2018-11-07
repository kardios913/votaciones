<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$idJornada = $_GET['id'];
 $cedula = $_GET['ced'];

echo $result = $facade->AprobarCandidatura($cedula, $idJornada);
?>
  