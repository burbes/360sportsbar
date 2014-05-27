<?php
/*
 * ***********************************************
 * Objetivo:     Tela de configurações dos associados
 *               
 * Created on :  09/04/2014
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
<script type="text/javascript" src="./js/associados.js" language="javascript"  ></script>
<script type="text/javascript" src="./js/ckeditor/ckeditor.js" language="javascript"  ></script>
<script type="text/javascript" src="./js/ckeditor/adapters/jquery.js" language="javascript"  ></script>

<script src="./js/jquery.js" type="text/javascript" language="javascript" ></script> <!-- AUTOCOMPLETE -->
<script src="./js/jquery-ui-autocomplete.js" type="text/javascript" language="javascript" ></script> <!-- AUTOCOMPLETE -->
<script src="./js/jquery.select-to-autocomplete.min.js" type="text/javascript" language="javascript" ></script> <!-- AUTOCOMPLETE -->
<script src="./js/jquery.maskedinput.min.js" type="text/javascript" language="javascript" ></script>  <!-- MASCARA DE CAMPO -->
<script src="./js/paginate/associados/paginate.js" type="text/javascript" language="javascript" ></script>

<!-- CSS -->
<link href="./css/associados.css" type="text/css" rel="stylesheet" />

<!-- AÇÕES ( INSERIR/EDITAR/REMOVER ) -->
<?php include 'acoes.php'; ?>

<br/>

<!-- LISTAGEM E PAGINAÇÃO -->
<?php include 'lista.php'; ?>

<br/>

<!-- FORMULÁRIO -->
<?php include 'formulario.php'; ?>

<br/>
