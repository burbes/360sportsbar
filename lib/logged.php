<?php

/* PEGA O CAMINHO DO ARQUIVO */
$file = $_SERVER["SCRIPT_NAME"];

/* SE O ARQUIVO NÃO FOR login.php */
if (!preg_match('/login.php$/', $file)) {
    
    /* VERIFICA SE O USUÁRIO ESTÁ LOGADO */
    $ok = isLogged();

    /* SE NÃO ESTIVER LOGADO REDIRECIONA O USER P/ A TELA DE LOGIN */
    if (!$ok) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=sair.php\">";
        exit();
        return false;
    }
}