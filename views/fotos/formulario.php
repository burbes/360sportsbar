<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Fotos
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

<form action="" method="post" name="fotos_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados das Fotos</legend>        

        <label for="sltTelas">Telas:</label><br/>
        <select name="ID_TELA" id="sltTelas" autofocus="autofocus" class="w100px" >
            <option value=''>&nbsp;</option>
            <?php
            echo Fotos::selectOptionGalerias();
            ?>
        </select>

    <br/>

    <table class="w700px">
        <tr>
        <td>
        <label for="txtImagem">Imagem Notícia:</label>
        <input type="file" name="file" id="txtImagem" />

        <div id="divImg" onmouseover="objNoticias.fnShowImage(true, $('#hddID').val(), 'img');" onmouseout="objNoticias.fnShowImage(false, null, 'img')" class="cp "></div>
        </td>
        <td>
            <div class="pr">
                <div id="dvImgShow" style="display: none" class="pa">
                    <label for="imgShow" id="lblImgShow" >Imagem Existente:</label>
                    <img id="imgShow"  src="" class="boxImagem"   />
                </div>
            </div>
        </td>
        </tr>
    </table>


    <div class="cb">&nbsp;</div>        

    <div id='upload'>

        <div id='dvBotoes'>
            <div id='dvAdicionar' class='fl w100px'>
                <a onclick='objNoticias.fnDuplicaFile("+")' class='w300px'>(+) Adicionar</a>
            </div>
            <div id='dvRemover' class='fl w100px'>
                <a onclick='objNoticias.fnDuplicaFile("-")' class='w300px'>(-) Remover</a>
            </div>
        </div>

        <br/>

        <!-- Primeira Imagem da Galeria -->
        <div id='dvImg1'>
            <input type='file' id='Imagem1' name='ARQUIVOS[]' /> 
        </div>
    </div>
    
    
    
    </fieldset>

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_FOTO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objFotos.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objFotos.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["ID_USUARIO"] ?>" />
</form>