<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Status
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

/* PROTEGE O FORM CONTRA SPOOFING */
include './lib/antiSpoofing.php';
?>

<form action="" method="post" name="status_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados das Status</legend>
        
            <label for="txtNome">Nome:</label><br/>
            <input type="text" name="NOME" id="txtNome" />

            <br/>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="ATIVO" id="chkAtivo" value="1" checked="checked" />

    </fieldset>

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_STATUS" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objStatus.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objStatus.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["ID_USUARIO"] ?>" />
</form>