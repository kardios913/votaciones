<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$codigo = $_POST['codigo'];
$cedula = $_POST['documento'];
$contrasena = $_POST['contrasena'];


$result = $facade->validarEstudiante($codigo,$cedula,$contrasena);





if ($result) {

    session_start();
    $_SESSION['codigo'] = $codigo;
    echo "<script language='javascript'>
              window.location.href = 'FormEstudiante.php';
               </script>";
} else {


    echo '<script>alert("Datos Incorrectos!") </script>';

}
