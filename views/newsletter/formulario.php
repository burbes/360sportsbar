<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de NewsLetter
 *               
 * Created on :  07/04/2014
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

<form action="" method="post" name="NewsLetter_form" style="display: none;"  >

    <fieldset>
        <legend>Dados NewsLetter</legend>

        <div class="w50p fl">
            <label for="txtEmail">Email:</label>
            <input type="email" name="Email" id="txtEmail" />
        </div>

        <br/>

        <label for="chkAtivo">Ativo:</label>
        <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />
        
    </fieldset>
    
    <div class="cb">&nbsp;</div>        

    <br/><br/>

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objNewsLetter.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objNewsLetter.fnResetForm()" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_NEWSLETTER" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

</form>