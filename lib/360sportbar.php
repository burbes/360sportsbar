<?php

/*
 * ***********************************************
 * Objetivo:     Arquivo das funções de permissões e erros
 *               
 * Created on :  26/02/2014
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

/* * VERIFICA SE O USUÁRIO ESTÁ LOGADO * */
function isLogged() {
    return isset($_SESSION) && is_array($_SESSION) && strlen(trim($_SESSION["ID_USUARIO"])) > 0;
}

/* * VERIFICA SE O USUÁRIO É ADMINISTRADOR * */
function isAdmin() {
    return isset($_SESSION) && is_array($_SESSION) && strlen(trim($_SESSION["ADMINISTRADOR"])) > 0;
}

/* * VERIFICA SE O USUÁRIO É OPERADOR * */
function isOperador() {
    return isset($_SESSION) && is_array($_SESSION) && strlen(trim($_SESSION["OPERADOR"])) > 0;
}

/* TRANSFORMA A DATA DE DD/MM/YYYY EM YYYY-MM-DD PARA PODER INSERIR NO BD */
function dataSQL($regular_date) {
    if (!preg_match('/\d{2}\/\d{2}\/\d{4}/', $regular_date))
        return $regular_date;
    $tokens = explode("/", $regular_date);
    return $tokens[2] . "-" . $tokens[1] . "-" . $tokens[0];
}

/* TRANSFORMA A DATA DE YYYY-MM-DD EM DD/MM/YYYY PARA PODER EXIBIR NO SISTEMA */
function formataData($sql_date, $time = false) {
    if (!preg_match('/\d{4}-\d{2}-\d{2}/', $sql_date))
        return $sql_date;
    $tokens = explode("-", $sql_date);
    $str = substr($tokens[2], 0, 2) . "/" . $tokens[1] . "/" . $tokens[0];
    if ($time && preg_match('/\d{2}:\d{2}:\d{2}/', $sql_date))
        $str .= substr($sql_date, 10);
    return $str;
}

