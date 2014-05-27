<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Banners
 *               
 * Created on :  18/03/2014
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

<link href="css/banners.css" rel="stylesheet" type="text/css"/>

<form action="" method="post" name="banners_form" style="display: none;"  enctype="multipart/form-data" >

    <label for="txtTitulo">Titulo:</label>
    <input type="text" name="Titulo" id="txtTitulo" />

    <br/>

    <label for="txtLink">Link:</label>
    <input type="url" placeholder="http://" name="Link" id="txtLink" />

    <br/>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor" name="Descricao" id="txtAreaDescricao"></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objBanners.fnShowImage(true, $('#hddID').val());" onmouseout="objBanners.fnShowImage(false)" class="cp "></div>

    <br/>

    <div class="pr">
        <div class="pa">
            <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
            <img id="imgShow" style="display: none" src="" class="boxImagem"  />
        </div>
    </div>

    <br/>

    <label for="chkAtivo">Ativo:</label>
    <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />

    <br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />
    
    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_BANNER" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objBanners.fnSubmitForm();" />
    
    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objBanners.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>