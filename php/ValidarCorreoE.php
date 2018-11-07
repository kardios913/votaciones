<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$correoE = $_POST['mailE'];
$codigo = $_POST['cod'];




$result = $facade->ValidarCorreoE($correoE, $codigo);
if ($result > 0) {
    //hashE=$facade->enviarHash($correoE);

    echo "<script language='javascript'>
            alert('Se te ha enviado un correo con la clave de confirmacion!')
              window.location.href = 'FormValidarHashE.php?co=$correoE&cod=$codigo';
               </script>";
} else {
    echo "<script language='javascript'>alert('Mail o Codigo Incorrecto!')
window.location.href = 'FormValidarCorreoE.php';    
</script>";
}

?>


