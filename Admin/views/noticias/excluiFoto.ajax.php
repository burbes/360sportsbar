<?php

include '../../lib/conexao.php';
include '../../lib/functions.php';
include '../../models/Noticias.php';

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Noticias

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

if ((!empty($_POST['id_foto']) ) && (!empty($_POST['id_noticia']) )) {

    /* EXCLUI A FOTO */
    $return = Noticias::excluirFoto(Array('ID_FOTO' => $_POST['id_foto']));

    /* CASO NÃO TENHA + FOTOS NESSA NOTICIA, É ATUALIZADA GALERIA PARA 0 (FALSE) */
    $qtdeFotos = Noticias::qtdeFotos($_POST['id_noticia']);
    if ($qtdeFotos == 0)
        Noticias::atualizar(Array('galeria' => 0), Array('id_noticia' => $_POST['id_noticia']));

    echo "{'ok': $return }";
} else
    echo "{'ok': false }";


    