<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Galerias
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

<form action="" method="post" name="galerias_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados das Galerias</legend>
        <table class='w100p'>
            <tr>
            <td class='w50p'>
            <label for="txtTitulo">Titulo:</label><br/>
            <input type="text" name="TITULO" id="txtTitulo" />

            <br/>

            <label for="txtSubTitulo">SubTitulo:</label><br/>
            <input type="text" name="SUB_TITULO" id="txtSubTitulo" />

            <br/>

            <label for="txtData">Data:</label><br/>
            <input type="date" name="DATA" id="txtData" />

            <br/>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="ATIVO" id="chkAtivo" value="1" checked="checked" />

            </td>

            <td class='w50p'>

            <label for="txtFotografo">Fotografo:</label><br/>
            <input type="text" name="FOTOGRAFO" id="txtFotografo" />

            <br/>


            <br/>
            <label for="txtImagem">Imagem de Capa:</label>
            <input type="file" name="file" id="txtImagem" />
            <div id="divImg" onmouseover="objGalerias.fnShowImage(true, $('#hddImg' + $('#hddID').val()).val());" onmouseout="objGalerias.fnShowImage(false)" class="cp "></div>

            <br/><br/>

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

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_GALERIA" id="hddID" value="" />
    <input type="hidden" name="ID_IMAGEM" id="hddIdImg" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objGalerias.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objGalerias.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["ID_USUARIO"] ?>" />
</form>