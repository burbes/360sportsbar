<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//session_start();
include "header.php";
?>
<html lang="pt-BR">

    <head>
        <?php include "head.php" ?>
        <title>AFRAC</title>
    </head>

    <body>
        <h1>AFRAC</h1>
        <h2>Autenticação no sistema</h2>

        <?php
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
        $pwd = isset($_POST["senha"]) ? trim($_POST["senha"]) : null;

        if ($email && $pwd) {
            echo "<p>Autenticando no sistema ...</p>";

            $u = Login::auth($email, $pwd);

            if ($u) {

                foreach ($u as $user) {
                    
                    echo "<p>Bem-vindo, " . $user['NOME'] . ", redirecionando em 1 segundo ...</p>";
                    $_SESSION['ID_USUARIO'] = '1';//$user['ID_USUARIO'];
                    $_SESSION['NOME'] = $user['NOME'];
                    $_SESSION['EMAIL'] = $user['EMAIL'];
                    $_SESSION['ADMINISTRADOR'] = $user['ADMINISTRADOR'] == true ? 1 : 0;
                    $_SESSION['OPERADOR'] = $user['OPERADOR'] == true ? 1 : 0;

                    print "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                    exit;
                }
            }
            print "<p class='erro'><b style='color:red'>Autenticação inválida.</b></p>";
        }
        ?>
        <form action="login.php" method="post">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email"/>
            </p>
            <p>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha"/>
            </p>
            <p>
                <input type="submit" value="Autenticar"/>
            </p>
        </form>
    </body>
</html>
