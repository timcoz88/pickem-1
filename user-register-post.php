<?php
require_once ("global.php");
require_once ("login.php");

try {
    
    $secret_key = '6Lfs5VIUAAAAAMloVaYo0uYzzZU02nZ81MEReVki';
    
    // Pego a validação do Captcha feita pelo usuário
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    // Verifico se foi feita a postagem do Captcha
    if (isset($recaptcha_response)) {
        
        // Valido se a ação do usuário foi correta junto ao google
        $answer = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']));
        
        // Se a ação do usuário foi correta executo o restante do meu formulário
        if ($answer->success) {
            
            if (isset($_POST['email']) && empty($_POST['email'] == false)) {
                
                $emailUsuario = addslashes($_POST['email']);
                
                $senhaUsuario = addslashes($_POST['senha']);
            }
            
            $nomeUsuario = $_POST['nome'];
            $sobrenomeUsuario = $_POST['sobrenome'];
            
            $tipoUsuario = 1;
            $usuarioAtivo = 1;
            date_default_timezone_set('America/Sao_Paulo');
            $dataCadastro = date('Y-m-d H:i:s');
            
            $usuario = new Usuario();
            
            $usuario->setNomeUsuario($nomeUsuario);
            $usuario->setSobrenomeUsuario($sobrenomeUsuario);
            $usuario->setEmailUsuario($emailUsuario);
            $usuario->setSenhaUsuario($senhaUsuario);
            $usuario->setTipoUsuario($tipoUsuario);
            $usuario->setUsuarioAtivo($usuarioAtivo);
            $usuario->setDataCadastro($dataCadastro);
            
            // $conexao = Conexao::pegarConexao();
            $usuarioDao = new usuarioDao();
            
            if ($usuarioDao->inserir($usuario)) {
                logaUsuario($emailUsuario, $senhaUsuario);
                Sessao::setSessao("success", "Cadastro realizado com sucesso");
            } else {
                Sessao::setSessao("danger", "Algum erro na criação");
                header("Location: user-register.php");
            }
        }
    }else {
        echo "Por favor faça a verificação do captcha abaixo";
    }
} catch (Exception $e) {
    Erro::trataErro($e);
}
