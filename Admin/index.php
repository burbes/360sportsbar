<?php
/*
 * ***********************************************
 * Objetivo:     Estrutura centra e principal do sistema.
 *               
 * Created on :  20/02/2014
 * Author     :  Naelson Matheus Jr
 * 
 * ***********************************************
 * Updates
 * 
 * Created on :  DD/MM/YYYY
 * Author     :  
 * Description:  
 * 
 */

/* EXIBE OS ERROS */
error_reporting(E_ALL); //dev
//error_reporting(E_ALL ^ E_NOTICE);//prod

/* INCLUI O CABECALHO COM TODAS AS FUNÇÕES */
include "./header.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <?php
        /* CSS & JS */
        include "./head.php";
        ?>

        <title>360° SPORTS BAR</title>

    </head>

    <body>
        <?php
        /* Menu Topo */
        include './menu.php';

        echo "<br/>";

        /* Corpo da pagina */
        include './body.php';
        
        /* Botão Sair */
        if (isset($_SESSION)) {
            ?>
            <div>
                <ul>
                    <li><a href="sair.php" onclick='return confirm("Tem certeza que deseja sair?")'>Sair</a></li>
                </ul>
            </div>
        <?php } ?>

    </body>

</html>
