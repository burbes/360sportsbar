<?php

include '../../lib/conexao.php';
include '../../lib/functions.php';

/*
 * UPLOAD DA GALERIA DE FOTOS DE NOTICIAS
 * 
 *  AUTHOR: NAELSON MATHEUS JUNIOR
 *  DATE:   02/04/2014  
 * 
 * *****************************************
 *  UPDATES
 * 
 *  AUTHOR:
 *  DATE:
 *  
 *  */
if (!empty($_FILES)) {

    /* PASTA */
    $strDirName = $_POST['pasta'];

    /* CONDIÇÕES 
     * [dirType]: MOVER PARA PASTA DE IMAGENS */
    $condicoes = Array("dirType" => '../../../img');

    /* GAMBIARRA P/ PODER FAZER FUNCIONAR NA FUNÇÃO 'UPLOADFILE' */
    $_FILES['file'] = $_FILES['Filedata'];

    /* ELIMINA A VARIAVEL */
    unset($_FILES['Filedata']);

    /* PARA CADA ARQUIVO */
    $uploadFile = Functions::uploadFile($strDirName, $condicoes);

    /* IMPRIME O RESULTADO (TRUE/FALSE) */
    echo $uploadFile['result'];
}
?>