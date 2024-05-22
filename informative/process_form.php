<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretKey = "6Le-ceQpAAAAALuPL0IxTaWcbc_uNTkofiYotgSe"; // Reemplaza con tu clave secreta
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    // URL para verificar el CAPTCHA
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

    // Solicitud de verificación a reCAPTCHA
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "Por favor, completa el CAPTCHA.";
    } else {
        // Procesa el formulario
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        // Configuración del correo
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = '21045100@alumno.utc.edu.mx'; // Reemplaza con tu dirección de correo de Gmail
            $mail->Password = 'Orlando01@.'; // Reemplaza con tu contraseña de Gmail o App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom($email, $name);
            $mail->addAddress('op707494@gmail.com'); // Reemplaza con la dirección de correo donde deseas recibir los mensajes

            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje de contacto';
            $mail->Body    = "Nombre: $name<br>Correo: $email<br>Teléfono: $phone<br>Mensaje:<br>$message";
            $mail->AltBody = "Nombre: $name\nCorreo: $email\nTeléfono: $phone\nMensaje:\n$message";

            $mail->send();
            echo 'Formulario enviado con éxito.';
        } catch (Exception $e) {
            echo "Error al enviar el formulario. Inténtalo de nuevo. Error: {$mail->ErrorInfo}";
        }
    }
} else {
    echo "Método de solicitud no válido.";
}
