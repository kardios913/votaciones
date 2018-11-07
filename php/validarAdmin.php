<?php
 include_once '../Facade/facVotacion.php'; 
   $facade = facVotacion::getInstance(); 
       
   $mail=$_POST['mail'];
   $contrasena=$_POST['contra'];
   
   $result = $facade->validarAdmin($mail, $contrasena);
   

  
  
   
if($result){
   
  session_start();
    $_SESSION['mail']=$mail;
  echo "<script language='javascript'>
              window.location.href = 'FormAdmin.php';
               </script>";   
}
 else {
   
    
echo '<script>alert("Contraseña o Usuario Incorrecto!") </script>';

  
 }


?>