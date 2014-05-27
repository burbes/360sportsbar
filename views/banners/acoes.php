<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Usuários

 *               
 * Created on :  24/02/2014
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

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Banners::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            $ok = Banners::inserir($_POST);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_BANNER" => $_POST['ID_BANNER'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Banners::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Banners::atualizar($_POST, $condicoes);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Remover':
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_BANNER" => $_POST['ID_BANNER']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Banners::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

