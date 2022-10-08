<?php
$nombre = $_POST['nombre'];
$nacimiento = $_POST['nacimiento'];
$edad = $_POST['edad'];
$identificacion = $_POST['identificacion'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$actividad = $_POST['actividad'];
$eps = $_POST['eps'];
$sangre = $_POST['sangre'];
$beneficiarios = $_POST['beneficiarios'];
$beneficiarios2 = $_POST['beneficiarios2'];
$beneficiarios3 = $_POST['beneficiarios3'];
$beneficiarios4 = $_POST['beneficiarios4'];
$beneficiarios5 = $_POST['beneficiarios5'];
$beneficiarios6 = $_POST['beneficiarios6'];
$beneficiarios7 = $_POST['beneficiarios7'];


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




$body = "Nombre Y Apellidos: " . $nombre . "<br>Fecha De Nacimiento: " . $nacimiento . "<br>Edad: " . $edad . "<br>Cedula: " . $identificacion . "<br>Telefono: " . $telefono . "<br>Direccion: " . $direccion . "<br>Estado Civil: " . $estado . "<br>Actividad Laboral: " . $actividad . "<br>Eps: " . $eps . "<br>Tipo De Sangre: " . $sangre .  "<br>Beneficiario#1: " . $beneficiarios .  "<br>Beneficiario#2: " . $beneficiarios2 .  "<br>Beneficiario#3: " . $beneficiarios3 . "<br>Beneficiario#4: " . $beneficiarios4 . "<br>Beneficiario#5: " . $beneficiarios5 . "<br>Beneficiario#6: " . $beneficiarios6 . "<br>Beneficiario#7: " . $beneficiarios7 .  "<br>Codigo Asesor: " . $codigo;

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
    $mail->Subject = 'Datos De Usuario (Suscripscion) Desde La App Vive Sano';
    $mail->Body = $body;

    $mail->send();
   
/*     header("Location:index.html"); */
} catch (Exception $e) {
   
    echo "Error Al Enviar El Mensaje: {$mail->ErrorInfo}";
}











?>



    <!-- Button trigger modal -->

<!-- Modal -->




































    <script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/5c097ba349.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>
</html>