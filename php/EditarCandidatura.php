<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$idJornada = $_POST['idJornada'];
 $codigo = $_POST['codigo'];
$foto= $_FILES['foto']['name'];
 $ruta= $_FILES['foto']["tmp_name"];
 $file="../ImagenCandidatos/".$foto;
 $descripcion=$_POST['descripcion'];

 $result2 = $facade->EditarImagen($codigo, $idJornada,$file); 
$result = $facade->EditarCandidatura($idJornada,$codigo, trim($descripcion));
if ($result) {
    echo '<script>alert("Candidatura Actualizada") </script>';
    echo "<script language='javascript'>
              window.location.href = 'FormListarCandidaturas.php';
               </script>";
} else {
    echo '<script>alert("Fallo en la actualizacion..") </script>';
    echo "<script language='javascript'>
            	window.location.href = 'FormListarCandidaturas.php';
            	</script>";
}

copy($ruta, $file);