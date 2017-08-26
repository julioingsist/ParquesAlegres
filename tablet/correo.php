<?php
require_once('../wp-config.php');
$link = "http://parquesalegres.org/tablet/solicitudes.php";
//$link .= $codigo;
$email="contacto@parquesalegres.org";
$copia="";
$subject = "Sistema de solicitudes"; 
$message = "<html><body>";
$sql="select status from solicitudes where status=0";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0){
    $message .="Actualmente tiene: <b>".mysql_num_rows($res)."</b> Solicitudes pendientes.";
    $message .="<br>Para ver y/o autorizarlas, visite el siguiente enlace:<br> $link</p>";
    $message .= "</body></html>";
    $cabeceras = "From: Parques Alegres " . $email . "\r\n";
    //$cabeceras .= "CC: otracasilladeemail@yahoo.com\r\n";
    $cabeceras .= "MIME-Version: 1.0\r\n";
    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
    $to="contacto@parquesalegres.org";
    //$to="gudart@gmail.com";
    mail($to, $subject, $message, $cabeceras);
}
?>