<?php

/* NOME DO ARQUIVO */
$filename = "NewsLetterExcelList";

/* INCLUSÃO DOS MODULOS PARA CONSULTAR OS DADOS NO BANCO */
include '../../lib/conexao.php';
include '../../lib/functions.php';
include '../../models/NewsLetter.php';

/* LISTA DE NEWSLETTER */
$lista = NewsLetter::listar();

/* PRIMEIRA LINHA DO DOCUMENTO */
$contents = " EMAIL NEWSLETTER \t \n ";

/* CONCATENANDO VARIAVEL PARA POPULAR O DOC */
foreach ($lista as $newsletter)
    $contents .= "{$newsletter['email']} \t \n";

// Headers
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-type: application/ms-excel");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=$filename.xls "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
header("Content-Transfer-Encoding: binary ");

/* IMPRIME A LISTA JÁ NO FORMATO DO EXCEL */
echo $contents;

exit();
?>