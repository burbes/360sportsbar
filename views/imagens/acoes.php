<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Imagens

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

$msg = "";

$acao = isset($_REQUEST['Acao']) == true ? $_REQUEST['Acao'] : null;

switch ($acao) {

    case 'Inserir':
        unset($_POST['ID_IMAGEM']);

        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');
        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Imagens::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['IMG'] = $file['fullPathFile'];
        } else {
            unset($_POST['ID_IMAGEM']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            $ok = Imagens::inserir($_POST);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";


        break;

    case 'Atualizar':
        
        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_IMAGEM" => $_POST['ID_IMAGEM'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;


        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {

            $file = Imagens::carregaArquivo($condicoes);

            /* FÇ ATUALIZA OS DADOS */
//            $id_imagem = Imagens::atualizaImg(Array(/* $dados */
//                        'ID_IMAGEM' => $_POST['ID_IMAGEM'],
//                        'IMG' => $file['fullPathFile'],
//                        'ID_TELA' => 1,
//                        'DATA_MODIFICACAO' => date(('Y-m-d'))), Array(/* $condicoes */
//                        'ID_USUARIO' => $_SESSION['ID_USUARIO'],)
//            );

            /* CAMINHO COMPLETO DA IMG */
            $_POST['IMG'] = $file['fullPathFile'];
        } else {
            unset($_POST['ID_IMAGEM']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Imagens::atualizar($_POST, $condicoes);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";


        break;

    case 'Remover':
        /* FÇ REMOVE IMG */
//        $remImg = Imagens::removerImg(Array(
//                    //'ID_IMAGEM' => $_POST['ID_IMAGEM'],
//                    'ID_IMAGEM' => $_POST['ID_IMAGEM']
//        ));
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_IMAGEM" => $_POST['ID_IMAGEM']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Imagens::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

