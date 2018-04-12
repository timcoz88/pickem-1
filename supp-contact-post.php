<?php


session_start();
require_once("global.php");
require_once("class/PHPMailer.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];



$mail->isSMTP();
$mail->Host = 'br112.hostgator.com.br';
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "support@mademano.com";
$mail->Password = "1MAD4jk6_support";

$mail->setFrom("support@mademano.com", "Support form");
$mail->addAddress("support@mademano.com");
$mail->Subject = "Support contact";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: supp-contact.php");
}
die();