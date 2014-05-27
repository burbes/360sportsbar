<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações dos eventos
 *               
 * Created on :  07/04/2014
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
<script type="text/javascript" src="./js/eventos.js" ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js" ></script>
<script type="text/javascript" src="./js/tcal.js"></script>  <!-- CALENDARIO -->
<script type="text/javascript" src="./js/paginate/eventos/paginate.js" ></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="./css/tcal.css" />  <!-- CALENDARIO -->
<!-- <link type="text/css" href="./css/eventos.css" rel="stylesheet" /> -->

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
