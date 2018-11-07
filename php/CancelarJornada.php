<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$id=$_GET['variable'];//para traerme el id que de la Jornada 

$result = $facade->CancelarJornada($id);

if ($result) {
    echo '<script>alert("Jornada Electoral Cancelada") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarJornada.php';
               </script>";
} else {
    echo '<script>alert("Fallo en la cancelacion..") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormListarJornada.php;
            	</script>";
}
?>



