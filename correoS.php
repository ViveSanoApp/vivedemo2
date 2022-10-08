<?php
$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$edad = $_POST['edad'];
$estado = $_POST['estado'];
$nacimiento = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$requerimiento = $_POST['requerimiento'];
$codigo = $_POST['codigo'];


$ip = $_SERVER ['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secretkey ="6LfEavMhAAAAAEreU3WnRnKTK4aiw_Zn8sntXOTU";

$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");



$atributos = json_decode($respuesta, TRUE);

if(!$atributos['success']){
echo '
<script>
alert("Verifique El Captcha");
window.history.go(-1);
</script>
';
$mail->send(false);
}else{
  echo'
  <script>
alert("Mensaje Enviado");
window.history.go(-1);
</script>
  
  ';

}


$body = "Nombre Y Apellidos: " . $nombre . "<br>Identificacion: " . $identificacion . "<br>Edad: " . $edad . "<br>Estado Civil: " . $estado . "<br>Fecha De Nacimiento: " . $nacimiento . "<br>Telefono: " . $telefono . "<br>Celular: " . $celular . "<br>Direccion: " . $direccion . "<br>Requerimiento: " . $requerimiento;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'vivesanonaudinfabra@gmail.com';                     //SMTP username
    $mail->Password = 'aifiaefcdnkjsbxy';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port =587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vivesanonaudinfabra@gmail.com', $nombre);
    $mail->addAddress('vivesanonaudinfabra@gmail.com', 'Naudin Fabra'); 
    $mail->addAddress('reportesvivesano@gmail.com', 'Naudin Fabra');     //Add a recipie                                        //Name is optional




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Datos De Usuario (Servicios) Desde La App Vive Sano';
    $mail->Body = $body;


    $mail->send();



} catch (Exception $e) {
    echo "Error Al Enviar El Mensaje: {$mail->ErrorInfo}";
}



?>