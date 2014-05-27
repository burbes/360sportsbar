<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro das NewsLetter

 *               
 * Created on :  07/04/2013
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

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if (isset($_POST))
            $ok = NewsLetter::inserir($_POST);

        /* MSG DE RETORNO */
        if ($ok) {
            $msg = " Dados <b>inseridos</b> com sucesso! ";
        }
        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR */
        $condicoes = Array("ID_NEWSLETTER" => $_POST['ID_NEWSLETTER']);

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if (isset($_POST))
            $ok = NewsLetter::atualizar($_POST, $condicoes); /* FÇ ATUALIZA OS DADOS */

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";

        break;

    case 'Remover':
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_NEWSLETTER" => $_POST['ID_NEWSLETTER']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = NewsLetter::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

