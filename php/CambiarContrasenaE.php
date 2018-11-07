<?php
include '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$usuario = trim($_POST['usuario']);
$documento=$_POST['documento'];
$contra = $_POST['contrasena'];
$ncontra = $_POST['Nuevacontrasena'];

$result = $facade->validarEstudiante($usuario,$documento,$contra);

if ($result) {

    $result2 = $facade->ActualizarPasswordE($usuario, $ncontra);
    if ($result2) {
        echo '<script>alert("Contrasena Cambiada") </script>';
        echo "<script language='javascript'>
              window.location.href = 'FormEstudiante.php';
               </script>";
    } else {
        echo '<script>alert("Proceso fallado!") </script>';
        echo "<script language='javascript'>
              window.location.href = 'FormCambiarContrasenaE.php';
               </script>";
    }
} else {


    echo '<script>alert("Contraseña Incorrecta!") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormCambiarContrasenaE.php';
               </script>";
}
?>