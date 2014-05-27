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
        
        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = isset($_POST['Ativo']) ? 1 : 0;
        $_POST['Newsletter'] = isset($_POST['Newsletter']) ? 1 : 0;
        
        /* DESATIVA  A VARIAVEL USUÁRIO */
        unset($_POST['ID_USUARIO']);
        
        /* FÇ INSERE OS DADOS */
        $ok = Usuarios::inserir($_POST);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";
        else
            $msg = "Erro ao inserir!";

        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR */
        $condicoes = Array("ID_USUARIO" => $_POST['ID_USUARIO']);

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;
        $_POST['Newsletter'] = isset($_POST['Newsletter']) ? 1 : 0;

        if($_POST['Senha'] == '')
            unset($_POST['Senha']);
        
        /* FÇ ATUALIZA OS DADOS */
        $ok = Usuarios::atualizar($_POST, $condicoes);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";
        else
            $msg = "Erro ao atualizar!";
        break;

    case 'Remover':
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_USUARIO" => $_POST['ID_USUARIO']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Usuarios::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

