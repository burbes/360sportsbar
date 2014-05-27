<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações dos Imagens
 *               
 * Created on :  25/02/2014
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
?>

<!-- JS --> 
<script type="text/javascript" src="./js/imagens.js" ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js" ></script>
<script type="text/javascript" src="./js/paginate/imagens/paginate.js" ></script>

<!-- CSS -->
<link type="text/css" href="./css/imagens.css" rel="stylesheet" />

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
