<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de publicações 
 *               e downloads
 *               
 * Created on :  15/04/2014
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

<form action="" method="post" name="autotec_form" style="display: none;"  enctype="multipart/form-data" >

    <fieldset>
        <legend>Dados Pessoais</legend>
        <table class="w100p">
            <tr>
            <td class="w50p">

            <label for="sltIdSegmento">Segmentos:</label>
            <select name="ID_SEGMENTO" id="sltIdSegmento">
                <?php echo AutoTec::selectOptionSegmentos(); ?>
            </select>

            <br/>

            <label for="txtCor">Cor:</label>
            <input type="text" name="Cor" id="txtCor" />
            </td>

            <td class="w50p">
            <label for="txtLink">Link:</label>
            <input type="text" name="Link" id="txtLink" />

            <br/>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />
            </td>
            </tr>
        </table>
    </fieldset>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Breve_Descr" id="txtAreaDescricao"></textarea>

    <br/>

    <table class="w700px">
        <tr>
        <td>
        <label for="txtImagem">Imagem:</label>
        <input type="file" name="file" id="txtImagem" />

        <div id="divImg" onmouseover="objAutoTec.fnShowImage(true, $('#hddID').val());" onmouseout="objAutoTec.fnShowImage(false)" class="cp "></div>
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
    <input type="button" id="btnSalvar" value="Salvar" onclick="objAutoTec.fnSubmitForm();" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_AUTOTEC" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

</form>