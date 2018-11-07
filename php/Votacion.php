<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$codigo = $_SESSION['codigo'];

echo $facade->ListarCandidatosJornada($idJornadaVotacion,$codigo);



?>



