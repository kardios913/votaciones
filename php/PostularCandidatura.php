<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$idJornada = $_POST['idJornada'];
 $cedula = $_POST['codigo'];
 $foto= $_FILES['foto']['name'];
 $ruta= $_FILES['foto']["tmp_name"];
 $file="../ImagenCandidatos/".$foto;

copy($ruta, $file);
$descripcion=$_POST['descripcion'];

$result2 = $facade->RegistrarImagen($cedula, $idJornada,$file); 
$result = $facade->RegistrarCandidatura($idJornada,$cedula, trim($descripcion));

if ($result ) {
    echo '<script>alert("Registro exitoso") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormEstudiante.php';
              </script>";
} else {
    echo '<script>alert("no se pudo insertar") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormPostularCandidatura.php;
            	</script>";
}
?>
  