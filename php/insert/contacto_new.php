<?php
/**
 * @version 1.0
 */

require("../../php/insert/class.phpmailer.php");
require("../../php/insert/class.smtp.php");
include("../../php/insert/insert_contacto.php");

// Valores enviados desde el formulario
/*if (!isset($_POST["razon"]) || !isset($_POST["persona"]) || !isset($_POST["pais"]) ||
  !isset($_POST["zona"]) || !isset($_POST["correo"]) || !isset($_POST["telefono"]) ||
  !isset($_POST["negocio"]) || !isset($_POST["requerimiento"]) ){die ("Es necesario completar todos los datos del formulario");}*/
//date_default_timezone_set('America/Caracas');

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["requerimiento"];
//$fecha = date("d-m-Y H:i:s");

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "mail.tuguiaturistica.com";  // Dominio alternativo brindado en el email de alta
$smtpUsuario = "carloscarvajal@tuguiaturistica.com";  // Mi cuenta de correo
$smtpClave = "Madera1504*";  // Mi contraseña

//Email donde se enviaran los datos cargados en el formulario de contacto
//$emailDestino = "hector.rodriguezb@gmail.com";
$emailDestino = "carvajalfiamengo1211@gmail.com";

/*$string = "Venezuela";
if (strcasecmp($pais, $string) === 0) {
    $emailDestino = "carlosc1211@hotmail.com";
} else {
    $emailDestino = "carvajalfiamengo1211@gmail.com";
}*/


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;

$mail->From = $smtpUsuario; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddReplyTo($correo); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante.
$mail->Subject = "Consulta de Clientes por Contactanos "; // Este es el titulo del email.

$mensajeHtml = "<h2>Posible Cliente</h2>";
$mensajeHtml .="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
$mensajeHtml .= "<body>";
$mensajeHtml .= "<p><b>Nombre:</p></b>" . $nombre;
$mensajeHtml .= "<p><b>Correo:</p></b>" . $correo . "\r\n";
$mensajeHtml .= "<p><b>Telefono:</p></b>" . $telefono . "\r\n";
$mensajeHtml .= "<p><b>Mensaje:</p></b>" . $mensaje . "\r\n";
$mensajeHtml .= "</body>";
$mail->Body = "{$mensajeHtml} <br /><br /><br />"; // Texto del email en formato HTML
//$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send();
if($estadoEnvio){
   
} else {
    echo "Ocurrió un error inesperado.";
}