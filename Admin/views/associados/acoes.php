<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Associados

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

$msg = "";

$acao = isset($_REQUEST['Acao']) == true ? $_REQUEST['Acao'] : null;

switch ($acao) {

    case 'Inserir':
        
        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');

        /* CASO O USUÁRIO NÃO TENHA DIGITADO SENHA, A SENHA É O EMAIL */
        if ($_POST['Senha'] == "")
            $_POST['Senha'] = strtolower($_POST['Email']);
        
        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Associados::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            $ok = Associados::inserir($_POST);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";

        break;

    case 'Atualizar':
        
        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_ASSOCIADO" => $_POST['ID_ASSOCIADO'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* CASO O USUÁRIO NÃO TENHA MUDADO DE SENHA */
        if ($_POST['Senha'] == "")
            unset($_POST['Senha']);
        
        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Associados::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO + FORMULÁRIO SUBMETIDO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Associados::atualizar($_POST, $condicoes);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Remover':
        /* CONDIÇÕES PARA REMOVER */
        $id = Array("ID_ASSOCIADO" => $_POST['ID_ASSOCIADO']);

        /* FÇ REMOVE OS DADOS */
        $ok = Associados::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo
        
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

