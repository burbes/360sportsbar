<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro das Redes Sociais

 *               
 * Created on :  03/04/2013
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

$msg = "";

$acao = isset($_REQUEST['Acao']) == true ? $_REQUEST['Acao'] : null;

switch ($acao) {

    case 'Inserir':

        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = RedesSociais::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }
        
        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST || (($file['result'] == true && $_FILES['file']['name'] != null) && $_POST)) {
            $ok = RedesSociais::inserir($_POST);
        }

        /* MSG DE RETORNO */
        if ($ok) 
            $msg = " Dados <b>inseridos</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo
        
        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_REDESOCIAL" => $_POST['ID_REDESOCIAL'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = RedesSociais::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = RedesSociais::atualizar($_POST, $condicoes);
        }

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Remover':
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_REDESOCIAL" => $_POST['ID_REDESOCIAL']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = RedesSociais::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

