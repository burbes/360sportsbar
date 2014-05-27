<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Parcerias

 *               
 * Created on :  24/04/2014
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

/* VALIDAÇÃO DO TIPO */
switch ($_POST['Tipo']) {
    case 'REALIZACAO':
        unset($_POST['Nome']);
        unset($_POST['Breve_Descr']);
        unset($_POST['Descricao']);
        break;
    case 'REALIZACAO':
        unset($_POST['Link']);
        break;
}

switch ($acao) {

    case 'Inserir':


        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Parcerias::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            $ok = Parcerias::inserir($_POST);
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
        $condicoes = Array("ID_PARCERIA" => $_POST['ID_PARCERIA'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Parcerias::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Parcerias::atualizar($_POST, $condicoes);
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
        $id = Array("ID_PARCERIA" => $_POST['ID_PARCERIA']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Parcerias::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

