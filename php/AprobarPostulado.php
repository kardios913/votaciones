<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$cedula=$_POST['cedula'];
$idJornada=$_POST['idJornada'];
$estado =$_POST['estado'];

$result = $facade->AprobarPostulado($estado,$cedula,$idJornada);

if ($result) {
    echo '<script>alert("Estado Actualizado") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarPostulados.php';
               </script>";
} else {
    echo '<script>alert("no se pudo actualizar") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormRevisarPostulado.php;
            	</script>";
}
        
?>