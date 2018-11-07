<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$id=$_GET['variable'];//para traerme el id que de la Jornada 
$codigo=$_GET['cod'];//para traerme el id que de la Jornada 

$result = $facade->CancelarCandidatura($id,$codigo);

if ($result) {
    echo '<script>alert("Candidatura Cancelada") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarCandidaturas.php';
               </script>";
} else {
    echo '<script>alert("Fallo en la cancelacion..") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormListarCandidaturas.php;
            	</script>";
}
?>
