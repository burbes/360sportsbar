<?php

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

$msg = "";

$acao = isset($_REQUEST['Acao']) == true ? $_REQUEST['Acao'] : null;

switch ($acao) {

    case 'Inserir':

        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;
        //$_POST['Galeria'] = is_null($_POST['Galeria']) ? 0 : 1;

        /* INICIALIZA A VARIAVEL */
        $ok = false;
        //var_dump($_POST);
        var_dump($_FILES['ARQUIVOS']);
        exit();
        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {

            /* EXCLUINDO VARIAVEL PARA EVITAR CONFLITO */
            unset($_FILES['file_galeria']);

            $file = Noticias::carregaArquivo($condicoes);
            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            //INSERE O REGISTRO E RETORNA O ID PARA UTILIZAR NA INSERÇÃO DA GALERIA
            $ok = Noticias::inserir($_POST);
        } else
            return false;

        //CASO REGISTRO INSERIDO E CASO HAJA GALERIA PARA SER SALVA
        if ($ok != false && count($_FILES) > 0)
            $ok = Noticias::salvaGaleria($_FILES['ARQUIVOS']);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_NOTICIA" => $_POST['ID_NOTICIA'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;

        /* UPLOAD DA IMAGEM */
        if ($_FILES['file']['name'] != null) {
            /* EXCLUINDO VARIAVEL PARA EVITAR CONFLITO */
            unset($_FILES['file_galeria']);

            $file = Noticias::carregaArquivo($condicoes);

            /* CAMINHO COMPLETO DA IMG */
            $_POST['img'] = $file['fullPathFile'];
        } else {
            unset($_POST['img']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Noticias::atualizar($_POST, $condicoes);
        } else
            return false;

        //CASO REGISTRO INSERIDO E CASO HAJA GALERIA PARA SER SALVA
        if ($ok != false && $_POST['ARQUIVOS'] != "")
            $ok = Noticias::salvaGaleria($_POST['ARQUIVOS']);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";
        else if ($_POST['img'])
            unlink($_POST['img']); //exclui a imagem caso não tenha salvo

        break;

    case 'Remover':
        /* CONDIÇÕES PARA REMOVER */
        $id = Array("ID_NOTICIA" => intval($_POST['ID_NOTICIA']));

        /* FÇ REMOVE OS DADOS */
        $ok = Noticias::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

