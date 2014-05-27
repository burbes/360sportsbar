<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Segmentos
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

<form action="" method="post" name="segmentos_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados do Segmento</legend>
        <table class="w100p">
            <tr>
            <td class="w50p">
            <label for="txtTitulo">Titulo:</label><br/>
            <input type="text" name="Titulo" id="txtTitulo" />
            </td>
            <td class="w50p" rowspan="2">
            <label for="txtBreveDescricao">Breve Descrição:</label><br/>
            <textarea name="Breve_Descr" id="txtBreveDescricao" class="w100p" ></textarea>
            </td>
            </tr>    
            <tr>
            <td>
            <label for="txtCor">Cor:</label><br/>
            <input type="color" name="Cor" id="txtCor" />
            </td>

            </tr>    
        </table>
    </fieldset>

    <br/>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao"></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objSegmentos.fnShowImage(true, $('#hddID').val());" onmouseout="objSegmentos.fnShowImage(false)" class="cp "></div>

    <br/>

    <div class="pr">
        <div class="pa">
            <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
            <img id="imgShow" style="display: none" src="" class="boxImagem"  />
        </div>
    </div>

    <br/>

    <label for="chkAtivo">Ativo:</label>
    <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked="checked" />

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_SEGMENTO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objSegmentos.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objSegmentos.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />
</form>