<?php
 include_once '../Facade/facVotacion.php'; 
  $facade = facVotacion::getInstance();
$idJornada=$idJornadaCulminada;

echo $facade->Resultados($idJornada);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

