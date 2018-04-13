<?php

session_start();
require_once("global.php");
require_once("PHPMailerAutoload.php");

//Defino a Chave do meu site
$secret_key = '6Lfs5VIUAAAAAMloVaYo0uYzzZU02nZ81MEReVki';

//Pego a validação do Captcha feita pelo usuário
$recaptcha_response = $_POST['g-recaptcha-response'];

// Verifico se foi feita a postagem do Captcha

if(isset($recaptcha_response)){
    
    // Valido se a ação do usuário foi correta junto ao google
    $answer =
    json_decode(
        file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
            '&response='.$_POST['g-recaptcha-response']
            )
        );
  
    // Se a ação do usuário foi correta executo o restante do meu formulário
    if($answer->success) { 
       try {
           
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        //Instancio a classe PHPMailer
        $mail = new PHPMailer();
        
        // Faço todas as configurações de SMTP para o envio da mensagem
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'br112.hostgator.com.br';
        $mail->Port = 465;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "support@mademano.com";
        $mail->Password = "1MAD4jk6_";
        //$msg->SMTPAutoTLS = false;
        $mail->AuthType = 'PLAIN';
           
        //Defino o remetente da mensagem
        $mail->setFrom('support@mademano.com','Support mademano.com');
        
        // Defino a quem esta mensagem será respondida, no caso, para o e-mail
        // que foi cadastrado no formulário
        $mail->addReplyTo($_POST['email'], $_POST['nome']);
        
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
        
        
        // Faço o envio da mensagem
        $enviado = $mail->Send();
        
        // Limpo todos os registros de destinatários e arquivos
        $mail->ClearAllRecipients();
        
        // Caso a mensagem seja enviada com sucesso ela retornará sucesso
        // senão, ela retornará o erro ocorrido
        if($enviado) {
            $_SESSION["success"] = "Mensagem enviada com sucesso";
            header("Location: index.php");
        } else {
            $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
            header("Location: supp-contact.php");
        }
       }catch (Exception $e) {
           Erro::trataErro($e);
       }

}
    
    // Caso o Captcha não tenha sido validado
    //retorno uma mensagem de erro.
    else {
        $_SESSION["danger"] = "Favor preencher o Captcha";
        header("Location: supp-contact.php");
    }
}