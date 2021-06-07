<?php

$nombre = $_POST["nombre"];
$correo = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "<b>Correo: </b>".$correo.
        "<br><b>Nombre: </b>".$nombre.
        "<br><b>Telefono: </b>".$telefono.
        "<br><b>Mensaje: </b><br>".$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';  

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
//$mail->SMTPDebug = 2;
//$mail->Debugoutput = 'html';

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'betmez.ec@gmail.com';                     // SMTP username
    $mail->Password   = 'qhytwclzquyiikjk';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo);
    $mail->addAddress('diego@betmez.com', 'Diego');     // Add a recipient
    $mail->addAddress('info@betmez.com', 'Info');     // Add a recipient
    $mail->addAddress('dbetancourta@gmail.com', 'Itoshac'); 
    $mail->addAddress('ginger.gomez.4g@gmail.com', 'Ginger'); 
    $mail->addAddress('betmez.ec@gmail.com', 'Betmez');
    //$mail->addAddress('ginger.gomez.4g@gmail.com', 'ConsulMarcas');     // Add a recipient
   

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo desde pagina Betmez';
    $mail->Body    = '<b>Nuevo Correo!</b><br>'.$body;
    

    $mail->send();
    echo    '<script>
                alert("El mensaje fue enviado con exito!");
                window.history.go(-1);
            </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}