<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações dos Noticias
 *               
 * Created on :  27/02/2014
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
<script language="javascript" type="text/javascript" src="./js/noticias.js" ></script>
<script language="javascript" type="text/javascript" src="./js/ckeditor/ckeditor.js" ></script>  <!-- WEBEDITOR -->
<script language="javascript" type="text/javascript" src="./js/ckeditor/adapters/jquery.js" ></script> <!-- WEBEDITOR -->
<script language="javascript" type="text/javascript" src="./js/jquery.maskedinput.min.js"></script>  <!-- MASCARA DE CAMPO -->
<!-- JS UPLOADIFY -->
<script language="javascript" type="text/javascript" src="./js/uploadfy/uploadify/swfobject.js"></script><!-- UPLOAD DE ARQUIVOS -->
<script language="javascript" type="text/javascript" src="./js/uploadfy/scrollbar.js"></script><!-- UPLOAD DE ARQUIVOS -->
<script language="javascript" type="text/javascript" src="./js/uploadfy/uploadify/jquery.uploadify.v2.1.4.min.js"></script> <!-- UPLOAD DE ARQUIVOS -->
<script language="javascript" type="text/javascript" src="./js/tcal.js"></script>  <!-- CALENDARIO -->
<script language="javascript" type="text/javascript" src="./js/paginate/noticias/paginate.js" ></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="./css/noticias.css" />
<link rel="stylesheet" type="text/css" href="./css/tcal.css" />  <!-- CALENDARIO -->
<link rel="stylesheet" type="text/css" href="./js/uploadfy/uploadify/uploadify.css" /> <!-- UPLOAD DE ARQUIVOS -->

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
