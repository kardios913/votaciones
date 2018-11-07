<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
session_start();
$codigo = $_SESSION['codigo'];
$fecha=$facade->datetimeCompleto();
$mail = $_POST['mail'];
$idJornada=$_POST['idJornada'];
$hash1 = $_POST['HashEnviado'];
$hash2 = $_POST['Hash'];
$votoBlanco='1';
$result = $facade->CompararHash($hash1, $hash2);
if ($result) {
    $result =$facade->RegistrarVotoB($codigo,$hash1,$fecha,$idJornada,$votoBlanco);
    if ($result) {
        echo '<script>alert("Voto exitoso") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormEstudiante.php';
               </script>";
    }else{
         echo '<script>alert("no se pudo insertar, intentelo mas tarde...") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormEstudiante.php;
            	</script>";
    }
} else {
    echo "<script language='javascript'>alert('Codigo No Coincide, se te ha enviado otro email!')
window.location.href = 'FormValidarVotoB.php?id=$idJornada&co=$mail';    
</script>";
}




?>


