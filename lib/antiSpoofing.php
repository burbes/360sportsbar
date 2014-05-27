<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* VERIFICA TENTATIVA DE SPOOFING E KICKA O USUÁRIO */
if ($_POST) {
    if ($_SESSION['token'] != $_POST['token']) {
        echo '<script>alert("Tentativa de SPOOFING!"); /*window.location = "index.php";*/</script>';
    }
}

/* $token UTILIZADO PARA VALIDAR ANTI SPOOFING */
$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;
