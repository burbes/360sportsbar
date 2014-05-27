<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Pessoas
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

/* PROTEGE O FORM CONTRA SPOOFING */
include './lib/antiSpoofing.php';
?>

<form action="" method="post" name="pessoas_form" style="display: none;"  enctype="multipart/form-data" >

    <fieldset>
        <legend>Dados Pessoais</legend>
        <table class="w100p">
            <tr>
            <td class="w50p">
            <label for="sltArea">Area:</label>
            <select name="Area" id="sltArea">
                <option value=""></option>
                <option value="DIRETORIA">DIRETORIA</option>
                <option value="REPRESENTANTE">REPRESENTANTE REGIONAL</option>
                <option value="COMISSAO">COMISSÃO DE ÉTICA</option>
            </select>

            <br/>

            <label for="txtNome">Nome:</label>
            <input type="text" name="Nome" id="txtNome" />

            <br/>

            <label for="txtCargo">Cargo:</label>
            <input type="text" name="Cargo" id="txtCargo" />

            </td>
            <td class="w50p">

            <label for="txtTelefone">Telefone:</label>
            <input type="text" name="Telefone" id="txtTelefone" placeholder="(99) 99999-9999" onkeypress="return objForm.fnSomenteNumero(event);" />

            <br/>

            <label for="txtEmail">Email:</label>
            <input type="email" name="Email" id="txtEmail" />

            <br/>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />

            </td>
            </tr>
        </table>

    </fieldset>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao"></textarea>

    <br/>

    <table class="w700px">
        <tr>
        <td>
        <label for="txtImagem">Imagem:</label>
        <input type="file" name="file" id="txtImagem" />

        <div id="divImg" onmouseover="objPessoas.fnShowImage(true, $('#hddID').val());" onmouseout="objPessoas.fnShowImage(false)" class="cp "></div>
        </td>
        <td>
            <div class="pr">
                <div class="pa">
                    <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
                    <img id="imgShow" style="display: none" src="" class="boxImagem"  />
                </div>
            </div>
        </td></tr>
    </table>

    <div class="cb">&nbsp;</div>        

    <br/><br/>

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objPessoas.fnSubmitForm();" />
    
    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objPessoas.fnResetForm()" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_PESSOA" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

</form>