<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Beneficios
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

<form action="" method="post" name="banners_form" style="display: none;"  enctype="multipart/form-data" >

    <fieldset>

        <legend>Dados Benefícios</legend>
        <table>
            <tr>
            <td class="w50p">
                <br/>
            <label for="txtTitulo">Titulo:</label>
            <input type="text" name="Titulo" id="txtTitulo" />
            <br/><br/>

            </td>
            <td class="w50p"> 

            <label for="txtImagem">Imagem:</label>
            <input type="file" name="file" id="txtImagem" />
            <div id="divImg" onmouseover="objBeneficios.fnShowImage(true, $('#hddID').val());" onmouseout="objBeneficios.fnShowImage(false)" class="cp "></div>

            <div class="pr" style="z-index: 10;">
                <div class="pa">
                    <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
                    <img id="imgShow" style="display: none" src="" class="boxImagem"  />
                </div>
            </div>

            </td>
            </tr>
        </table>

    </fieldset>
    <br/>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao"></textarea>

    <br/>

    <label for="chkAtivo">Ativo:</label>
    <input type="checkbox" name="Ativo" id="chkAtivo" checked />

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_BENEFICIO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objBeneficios.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objBeneficios.fnResetForm()" />


    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>