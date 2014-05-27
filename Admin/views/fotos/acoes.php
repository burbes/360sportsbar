<?php

/*
 * ***********************************************
 * Objetivo:     Açoes do Cadastro de Fotos

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
        unset($_POST['ID_FOTO']);

        /* CONDIÇÕES 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("dirType" => 'img');
        /* INICIALIZA A VARIAVEL */
        $ok = false;
        $dataAtual = date('Y-m-d');
        $id_usuario = $_POST['id_usuario'];

        /* GABIARRA NECESSÁRIA POIS UN-CHECKBOX NÃO ENVIA VALUE */
        $_POST['Ativo'] = is_null($_POST['Ativo']) ? 0 : 1;

        /* INSERE CADA ARQUIVOS NO BD */
        for ($i = 0; $i < count($_FILES['name']); $i++) {

            //fazer um esquema de tabelas de fotos para cada galeria 
            //$file = Functions::uploadFile($id_galeria, $condicoes);
            $file = Functions::uploadFile('FOTOS', $condicoes);
            //FALTA FAZER O UPLOADFILE PRA PARTE UPLOAD E TERMINAR A PARTE DO INSERT

            /* CONSULTA SQL */
            $sql = "    INSERT INTO fotos (img, id_galeria,data_modificacao,id_usuario,ativo) "
                    . " VALUES ( '{$_FILES['name'][$i]}', $id_galeria, '$dataAtual', $id_usuario , " . $_POST['Ativo'] . "); ";

            /* INSERE O ARQUIVO NO BD */
            $ok = Functions::querySQL($sql);
        }

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>inseridos</b> com sucesso! ";


        break;

    case 'Atualizar':

        /* CONDIÇÕES PARA ATUALIZAR 
         * [dirType]: MOVER PARA PASTA DE IMAGENS */
        $condicoes = Array("ID_FOTO" => $_POST['ID_FOTO'], "sqlInjection" => FALSE, "dirType" => 'img');

        /* INICIALIZA A VARIAVEL */
        $ok = false;

        /* UPLOAD DA FOTO */
        if ($_FILES['file']['name'] != null) {

            $file = Fotos::carregaArquivo($condicoes);

            /* FÇ ATUALIZA OS DADOS */
//            $id_imagem = Fotos::atualizaImg(Array(/* $dados */
//                        'ID_FOTO' => $_POST['ID_FOTO'],
//                        'IMG' => $file['fullPathFile'],
//                        'ID_TELA' => 1,
//                        'DATA_MODIFICACAO' => date(('Y-m-d'))), Array(/* $condicoes */
//                        'ID_USUARIO' => $_SESSION['ID_USUARIO'],)
//            );

            /* CAMINHO COMPLETO DA IMG */
            $_POST['IMG'] = $file['fullPathFile'];
        } else {
            unset($_POST['ID_FOTO']);
            unset($condicoes['dirType']);
        }

        /* FORMULÁRIO SUBMETIDO || CASO O ARQUIVO TENHA SIDO UPADO => INSERE OS DADOS */
        if ($_POST && !isset($file['result']) || ($file['result'] == true && $_POST)) {
            /* FÇ ATUALIZA OS DADOS */
            $ok = Fotos::atualizar($_POST, $condicoes);
        } else
            return false;

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " Dados <b>atualizados</b> com sucesso! ";


        break;

    case 'Remover':
        /* FÇ REMOVE IMG */
//        $remImg = Fotos::removerImg(Array(
//                    //'ID_FOTO' => $_POST['ID_FOTO'],
//                    'ID_FOTO' => $_POST['ID_FOTO']
//        ));
        /* CONDIÇÕES PARA ATUALIZAR */
        $id = Array("ID_FOTO" => $_POST['ID_FOTO']);

        /* FÇ ATUALIZA OS DADOS */
        $ok = Fotos::remover($id);

        /* MSG DE RETORNO */
        if ($ok)
            $msg = " <b>Removido</b> com sucesso! ";
        break;

    default:
        break;
}

/* EXIBE A MSG DE RESPOSTA */
echo "<span style='color:red'>$msg</span>";

