<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações dos Segmentos
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
<script type="text/javascript" src="./js/galerias.js" ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js" ></script>
<script type="text/javascript" src="./js/paginate/galerias/paginate.js" ></script>
<script type="text/javascript" src="./js/jquery.maskedinput.min.js" language="javascript" ></script>  <!-- MASCARA DE CAMPO -->

<!-- CSS -->
<link type="text/css" href="./css/galerias.css" rel="stylesheet" />

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
