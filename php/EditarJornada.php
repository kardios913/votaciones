<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$id =$_POST['id'];
$fechaInicio = $_POST['inicio'];
$fechaFin = $_POST['fin'];
$fechaInicioC = $_POST['inicioCa'];
$fechaFinC = $_POST['finCa'];
$tipoJornada = $_POST['tipo'];



$result = $facade->EditarJornada($fechaInicio,$fechaFin,$tipoJornada,$id,$fechaInicioC,$fechaFinC);

if ($result) {
    echo '<script>alert("Jornada Electoral Actualizada") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarJornada.php';
               </script>";
} else {
    echo '<script>alert("Fallo en la actualizacion..") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormEditarJornada.php';
            	</script>";
}
?>
