<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Comidas

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
        unset($_POST['ID_BEBIDA']);

        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['ATIVO'] = is_null($_POST['ATIVO']) ? 0 : 1;

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            $file = Comidas::carregaArquivo($condicoes);

            $id_imagem = Comidas::salvaImg(Array(
                        'IMG' => $file['fullPathFile'],
                        'ID_USUARIO' => $_SESSION['ID_USUARIO'],
                        'ID_TELA' => 1,
                        'DATA_MODIFICACAO' => date(('Y-m-d')))
            );

            /* CAMINHO COMPLETO DA IMG */
            $_POST['ID_IMAGEM'] = $id_imagem;
        } else {
            unset($_POST['ID_IMAGEM']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            $ok = Comidas::inserir($_POST);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";


        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_BEBIDA" => $_POST['ID_BEBIDA'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['ATIVO'] = is_null($_POST['ATIVO']) ? 0 : 1;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {

            $file = Comidas::carregaArquivo($condicoes);

            /* FÇ ATUALIZA OS DADOS */
            $id_imagem = Comidas::atualizaImg(Array(/* $dados */
                        'ID_IMAGEM' => $_POST['ID_IMAGEM'],
                        'IMG' => $file['fullPathFile'],
                        'ID_TELA' => 1,
                        'DATA_MODIFICACAO' => date(('Y-m-d'))), Array(/* $condicoes */
                        'ID_USUARIO' => $_SESSION['ID_USUARIO'],)
            );

            /* CAMINHO COMPLETO DA IMG */
            $_POST['ID_IMAGEM'] = $id_imagem;
        } else {
            unset($_POST['ID_IMAGEM']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Comidas::atualizar($_POST, $condicoes);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";


        break;

    case 'Remover':
        /* FÇ REMOVE IMG */
        $remImg = Comidas::removerImg(Array(
                    //'ID_BEBIDA' => $_POST['ID_BEBIDA'],
                    'ID_IMAGEM' => $_POST['ID_IMAGEM']
        ));
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_BEBIDA" => $_POST['ID_BEBIDA']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Comidas::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

