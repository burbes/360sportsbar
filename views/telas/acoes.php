<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Telas

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
        unset($_POST['ID_TELA']);

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['ATIVO'] = is_null($_POST['ATIVO']) ? 0 : 1;

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        $ok = Telas::inserir($_POST);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";


        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_TELA" => $_POST['ID_TELA'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['ATIVO'] = is_null($_POST['ATIVO']) ? 0 : 1;
        
        $ok = Telas::atualizar($_POST, $condicoes);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";


        break;

    case 'Remover':

        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_TELA" => $_POST['ID_TELA']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Telas::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

