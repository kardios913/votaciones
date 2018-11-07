<?php

include '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$usuario = trim($_POST['usuario']);
$contra = $_POST['contrasena'];
$ncontra = $_POST['Nuevacontrasena'];

$result = $facade->validarAdmin($usuario, $contra);

if ($result) {

    $result2 = $facade->ActualizarPassword($usuario, $ncontra);
    if ($result2) {
        echo '<script>alert("Contrasena Cambiada") </script>';
        echo "<script language='javascript'>
              window.location.href = 'FormAdmin.php';
               </script>";
    } else {
        echo '<script>alert("Proceso fallado!") </script>';
        echo "<script language='javascript'>
              window.location.href = 'FormCambiarContrasena.php';
               </script>";
    }
} else {


    echo '<script>alert("Contraseña Incorrecta!") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormCambiarContrasena.php';
               </script>";
}
?>