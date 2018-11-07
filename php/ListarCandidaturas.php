<?php

   include_once '../Facade/facVotacion.php'; 
  $facade = facVotacion::getInstance();
  $codigo=$_SESSION['codigo'];
  
  
 

     
//    echo $id_user.'-'.$token."-".$id_modulo_acti;
   echo $result= $facade->TablaCandidaturas($codigo);

    

?>