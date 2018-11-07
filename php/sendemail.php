<?php

function sendemail($mail_addAddress, $hash) {

    require '../util/PHPMailer/PHPMailerAutoload.php';
    $template = "email_template.html"; //Ruta de la plantilla HTML para enviar nuestro mensaje

    /* Inicio captura de datos enviados por $_POST para enviar el correo */
    $mail_setFromEmail = "Votacionesufps@gmail.com";
    $mail_setFromName = "VotacionesUFPS";
    $txt_message = " ".$hash;
    $mail_subject = "VotacionesUFPS" ;
    $mail = new PHPMailer;
    $mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
    $mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar 
    $mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
    $mail->Username = "votacionesufps@gmail.com";          // Correo electronico saliente ejemplo: tucorreo@gmail.com
    $mail->Password = "votaciones2018"; //Tu contraseña de gmail
    $mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
    $mail->Port = 587;                          // Puerto TCP  para conectarse 
    $mail->setFrom($mail_setFromEmail, $mail_setFromName); //Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
    $mail->addReplyTo($mail_setFromEmail, $mail_setFromName); //Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
    $mail->addAddress($mail_addAddress);   // Agregar quien recibe el e-mail enviado
    $message = file_get_contents($template);
    $message = str_replace('{{first_name}}', $mail_setFromName, $message);
    $message = str_replace('{{message}}', $txt_message, $message);
    $message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
    $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML

    $mail->Subject = $mail_subject;
    $mail->msgHTML($message);
    if (!$mail->send()) {
        echo '<p style="color:red">No se pudo enviar el mensaje..';
        echo 'Error de correo: ' . $mail->ErrorInfo . "</p>";
    } else {
        echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
    }
}

?>