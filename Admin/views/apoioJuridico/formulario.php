<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Apoio_Juridico
 *               
 * Created on :  04/04/2014
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

<form action="" method="post" name="apoio_juridico_form" style="display: none;"  enctype="multipart/form-data" >

    <label for="txtTitulo">Titulo:</label>
    <input type="text" name="Titulo" id="txtTitulo" />

    <br/>

    <div class="fl pr">
        <label for="txtLatitude">Latitude:</label>
        <input type="text" name="Latitude" id="txtLatitude" />

    </div>
    <div class="fl ">
        <label for="txtLongitude">Longitude:</label>
        <input type="text" name="Longitude" id="txtLongitude" />
    </div>
    
    <br/>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao"></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objApoio_Juridico.fnShowImage(true, $('#hddID').val());" onmouseout="objApoio_Juridico.fnShowImage(false)" class="cp "></div>

    <br/>

    <div class="pr">
        <div class="pa">
            <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
            <img id="imgShow" style="display: none" src="" class="boxImagem"  />
        </div>
    </div>

    <br/>

    <label for="chkAtivo">Ativo:</label>
    <input type="checkbox" name="Ativo" id="chkAtivo" checked />

    <br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_APOIOJURIDICO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objApoio_Juridico.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objApoio_Juridico.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>