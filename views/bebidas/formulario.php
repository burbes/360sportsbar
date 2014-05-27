<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Bebidas
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

<form action="" method="post" name="bebidas_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados das Bebidas</legend>
        <table class='w100p'>
            <tr>
            <td class='w50p'>
            <label for="txtNome">Nome:</label><br/>
            <input type="text" name="NOME" id="txtNome" />

            <br/>

            <label for="txtPreco">Preço:</label><br/>
            <input type="text" name="PRECO" id="txtPreco" />

            <br/>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="ATIVO" id="chkAtivo" value="1" checked="checked" />
            </td>
            <td class='w50p'>

            <label for="sltTipos">Tipos:</label><br/>
            <select name="ID_TIPO" id="sltTipos" autofocus="autofocus" class="w100px" >
                <option value=''>&nbsp;</option>
                <?php
                echo Bebidas::selectOptionTipos();
                ?>
            </select>

            <br/>
            <label for="txtImagem">Imagem:</label>
            <input type="file" name="file" id="txtImagem" />
            <div id="divImg" onmouseover="objBebidas.fnShowImage(true, $('#hddImg' + $('#hddID').val()).val());" onmouseout="objBebidas.fnShowImage(false)" class="cp "></div>

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
    <input type="hidden" name="ID_BEBIDA" id="hddID" value="" />
    <input type="hidden" name="ID_IMAGEM" id="hddIdImg" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objBebidas.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objBebidas.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["ID_USUARIO"] ?>" />
</form>