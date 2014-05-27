<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_SESSION['nome']))
    echo "<p>Usuario " . $_SESSION['nome'] . " saindo do sistema, redirecionando em 1 segundo ...</p>";
else
    echo "<p>Expulsando usu&aacuterio <b>DESCONHECIDO</b>, redirecionando em 1 segundo ...</p>";

$_SESSION = array();

session_destroy();

print "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
