<?php

/*
 * ***********************************************
 * Objetivo:     Carrega os modulos
 *               
 * Created on :  21/02/2014
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

/* ABRE SESSÃO */
session_start();

/* Codificação */
header('Content-type: text/html; charset=utf-8');

/* FUNÇÕES DE PERMISSÃO */
include "./lib/360sportbar.php";

/* VERIFICA SE O USUÁRIO ESTÁ LOGADO */
include "./lib/logged.php";

/* FUNÇÕES DE CONEXÃO */
include "./lib/conexao.php";

/* FUNÇÕES UTILIZADAS POR TODO O PROJETO (INSERIR/ATUALIZAR/REMOVER/..) */
include "./lib/functions.php";


/* INCLUI TODOS OS ARQUIVOS PHP DENTRO DE "MODELS" */
foreach (glob("models/*.php") as $file):
    include $file;
endforeach;
?>
