<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$mail = $_POST['mailA'];
$hash1 = $_POST['HashEnviado'];
$hash2 = $_POST['Hash'];
$ncontra = $_POST['nContraseña'];
$result = $facade->CompararHash($hash1, $hash2);
if ($result) {
    $result = $facade->ActualizarPassword($mail, $ncontra);
    if ($result) {
        echo "<script language='javascript'>
            alert('Password Actualizada!')
              window.location.href = 'FormLoginAdmin.php';
               </script>";
    }
} else {
    echo "<script language='javascript'>alert('Codigo No Coincide, se te ha enviado otro email!')
window.location.href = 'FormValidarHash.php?co=$mail';    
</script>";
}
?>