<?php
session_start();
require_once ("global.php");

require_once 'PHPMailerAutoload.php';

try {
    
    $nome = "Bruno";
    $email = "bhsousa@gmail.com";
    $mensagem = "teste de mensagem qualquer";
    
    //Instancio a classe PHPMailer
    $mail = new PHPMailer();
    
    // Faço todas as configurações de SMTP para o envio da mensagem
    $mail->SMTPDebug = 3; 
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = 'br112.hostgator.com.br';
    $mail->Port = 25;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "support@mademano.com";
    $mail->Password = "1MAD4jk6_";
    //$msg->SMTPAutoTLS = false;
    
    
    //Defino o remetente da mensagem
    $mail->setFrom('support@mademano.com','Support mademano.com');
    
    // Defino a quem esta mensagem será respondida, no caso, para o e-mail
    // que foi cadastrado no formulário
    $mail->addReplyTo($email, $nome);
    
    // Defino a mensagem como mensagem de texto (Ou seja não terá formatação HTML)
    $mail->IsHTML(false);
    
    // Adiciono o destinatário desta mensagem, no caso,
    //minha conta de contatos comerciais.
    $mail->AddAddress('support@mademano.com', 'Support mademano.com');
    
    // Defino o assunto que foi digitado no formulário
    $mail->Subject  = "Support contact";
    
    // Defino a mensagem que foi digitada no formulário
    $mail->Body = $mensagem;
    //$msg->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
    
    // Defino a mensagem alternativa que foi digitada no formulário.
    // Esta mensagem é utilizada para validações AntiSPAM e por isto
    // é muito recomendado que utilize-a
    $mail->AltBody = $mensagem;
    //$msg->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
    
    echo "<pre>";
    print_r($mail);
    echo "</pre>";

    // Faço o envio da mensagem
    $enviado = $mail->Send();
    
    echo "<pre>";
    print_r( $enviado);
    echo "</pre>";
    // Limpo todos os registros de destinatários e arquivos
    $mail->ClearAllRecipients();
    
    // Caso a mensagem seja enviada com sucesso ela retornará sucesso
    // senão, ela retornará o erro ocorrido
    if($enviado) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        //header("Location: index.php");
    } else {
        $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
        //header("Location: supp-contact.php");
    }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}catch (Exception $e) {
    Erro::trataErro($e);
}