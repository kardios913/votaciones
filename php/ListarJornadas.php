<?php

   include_once '../Facade/facVotacion.php'; 
  $facade = facVotacion::getInstance();
 
    
     
//    echo $id_user.'-'.$token."-".$id_modulo_acti;
    echo $result= $facade->TablaJornda();

    

?>
