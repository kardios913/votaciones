<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$fechaInicio = $_POST['inicio'];
$fechaFin = $_POST['fin'];
$fechaInicioC = $_POST['inicioC'];
$fechaFinC = $_POST['finC'];
$tipoJornada = $_POST['tipo'];

$usuario = trim($_POST['usuario']);


$result = $facade->RegistarJornada($fechaInicio,$fechaFin,$tipoJornada,'Activo',$usuario,$fechaInicioC,$fechaFinC);

if ($result) {
    echo '<script>alert("Registro exitoso") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarJornada.php';
               </script>";
} else {
    echo '<script>alert("no se pudo insertar") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormRegistrarJornada.php;
            	</script>";
}
?>
