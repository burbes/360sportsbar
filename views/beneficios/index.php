<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações de beneficios
 *               
 * Created on :  04/04/2014
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
<script type="text/javascript" src="./js/beneficios.js" ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js" ></script>
<script type="text/javascript" src="./js/paginate/beneficios/paginate.js" ></script>

<!-- CSS -->
<link type="text/css" href="./css/beneficios.css" rel="stylesheet" />

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
