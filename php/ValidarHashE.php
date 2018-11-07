<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$codigo = $_POST['cod'];
$hash1 = $_POST['HashEnviado'];
$hash2 = $_POST['Hash'];
$ncontra = $_POST['nContraseña'];
$result = $facade->CompararHash($hash1, $hash2);
if ($result) {
    $result = $facade->ActualizarPasswordE($codigo, $ncontra);
    if ($result) {
        echo "<script language='javascript'>
            alert('Password Actualizada!')
              window.location.href = 'FormLoginEstudiante.php';
               </script>";
    }
} else {
    echo "<script language='javascript'>alert('Codigo No Coincide, se te ha enviado otro email!')
window.location.href = 'FormValidarHashE.php?cod=$codigo';    
</script>";
}
?>

