<?php
 include_once '../Facade/facVotacion.php'; 
  $facade = facVotacion::getInstance();
  $codigo=$_SESSION['codigo'];
    echo $result= $facade->CargarDatosE($codigo);