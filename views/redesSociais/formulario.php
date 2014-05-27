<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de titulo da Home
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

<form action="" method="post" name="home_form" style="display: none;"  enctype="multipart/form-data" >


    <fieldset>
        <legend>Dados Redes Sociais</legend>

        <div class="w50p fl">
            <label for="txtNome">Nome:</label>
            <input type="text" name="Nome" id="txtNome" />
        </div>

        <div class="w50p fl">
            <label for="txtLink">Link:</label>
            <input type="url" placeholder='http://' name="Link" id="txtLink" />
        </div>

        <br/>

        <label for="chkAtivo">Ativo:</label>
        <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />

        <table id='tbImg' class='w700px'>        
            <tr>
            <td>
            <label for="txtImagem">Imagem:</label>
            <input type="file" name="file" id="txtImagem" />

            <div id="divImg" onmouseover="objRedeSocial.fnShowImage(true, $('#hddID').val());" onmouseout="objRedeSocial.fnShowImage(false)" class="cp "></div>
            </td>
            <td>
                <div class="pr">
                    <div class="pa">
                        <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
                        <img id="imgShow" style="display: none" src="" class="boxImagem"  />
                    </div>
                </div>
            </td>
            </tr> 
        </table>
        
    </fieldset>
    
    <div class="cb">&nbsp;</div>        

    <br/><br/>

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objRedeSocial.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objRedeSocial.fnResetForm()" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_REDESOCIAL" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

</form>