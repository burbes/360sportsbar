<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Imagens
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

<form action="" method="post" name="imagens_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados das Imagens</legend>        

        <label for="sltTelas">Telas:</label><br/>
        <select name="ID_TELA" id="sltTelas" autofocus="autofocus" class="w100px" >
            <option value=''>&nbsp;</option>
            <?php
            echo Imagens::selectOptionTelas();
            ?>
        </select>

        <br/>
        <label for="txtImagem">Imagem:</label>
        <input type="file" name="file" id="txtImagem" />
        <div id="divImg" onmouseover="objImagens.fnShowImage(true, $('#hddImg' + $('#hddID').val()).val());" onmouseout="objImagens.fnShowImage(false)" class="cp "></div>

        <br/><br/>

        <div class="pr">
            <div class="pa">
                <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
                <img id="imgShow" style="display: none" src="" class="boxImagem"  />
            </div>
        </div>

    </fieldset>

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_IMAGEM" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objImagens.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objImagens.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["ID_USUARIO"] ?>" />
</form>