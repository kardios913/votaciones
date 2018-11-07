<?php

include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();

$correoA = $_POST['mailA'];

    $result = $facade->ValidarCorreo($correoA);
    if ($result > 0) {

         
        
        echo "<script language='javascript'>
            alert('Se te ha enviado un correo con la clave de confirmacion!')
              window.location.href = 'FormValidarHash.php?co=$correoA';
               </script>";
    } else {
        echo "<script language='javascript'>alert('Mail Incorrecto!')
window.location.href = 'FormValidarCorreo.php';    
</script>";
    }
 
?>



