<?php 
include_once '../Facade/facVotacion.php'; 
  $facade = facVotacion::getInstance();
  $mail=$_SESSION['mail'];
    echo $result= $facade->CargarDatosS($mail);
    ?>