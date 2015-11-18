<?php
	require '../PHPMailerAutoload.php';
	include("../class.smtp.php");
	include("../class.phpmailer.php");
/*
$mail  = new PHPMailer(); 
$mail->CharSet ="ISO-8859-1";
$mail->IsSMTP(); 
$mail->SMTPDebug  = 1;                 
$mail->From = 'academicousp_electivoII@hotmail.com';
$mail->FromName = 'academicousp_electivoII@hotmail.com';
$mail->SMTPAuth   = true;                
$mail->SMTPSecure = "tls";                 
$mail->Host       = 'smtp.live.com';      
$mail->Port       = '587';                         

$mail->Username   = 'academicousp_electivoII@hotmail.com';            //Username of your email account
$mail->Password   = 'electivoII2015';                               //Password of your email account

$mail->SetFrom('academicousp_electivoII@hotmail.com', 'Name');
$mail->AddReplyTo('academicousp_electivoII@hotmail.com','Name');
$mail->Subject    = "Recuperar contraseña";
$mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test
$mail->MsgHTML("Recueprar");
$mail->AddAddress("gerson_990@hotmail.com", 'Gerson');

if(!$mail->Send()) {
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo "Message sent successfully!";
}
*/
$correo = "williams.mendozae@hotmail.com";



$mail = new PHPMailer();
$mail->SMTPSecure = 'tls';
$mail->Username = "academicousp_electivoII@hotmail.com";
$mail->Password = "electivoII2015";
$mail->AddAddress($correo);
$mail->FromName = "Academico";
$mail->Subject = "My Subject";
$mail->Body = "enviando correo";
$mail->Host = "smtp.live.com";
$mail->Port = 587;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->From = $mail->Username;
if(!$mail->Send()) {
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo "Message sent successfully!";
}