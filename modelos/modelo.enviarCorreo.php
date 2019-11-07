<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once("../vistas/js/PHPMailer/Exception.php");
    require_once("../vistas/js/PHPMailer/PHPMailer.php");
    require_once("../vistas/js/PHPMailer/SMTP.php");

    function enviarCorreo($emisor, $receptor, $email, $asunto, $mensaje) {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = "zuntrapopclub.com";                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = "password@zuntrapopclub.com";           // SMTP username
            $mail->Password   = ".pinshicontraseña";                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom("password@zuntrapopclub.com", $emisor);
            $mail->addAddress($email, $receptor);                       // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $mensaje;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
 ?>