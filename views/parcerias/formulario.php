<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Parcerias
 *               
 * Created on :  24/04/2014
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

<link href="css/parcerias.css" rel="stylesheet" type="text/css"/>

<form action="" method="post" name="parcerias_form" style="display: none;"  enctype="multipart/form-data" >

    <fieldset>

        <legend>Dados da Parceria/Realização</legend>

        <table border="0" class="w100p">
            <tr>
            <td class="w33p tac">

                <input type="radio" name="Tipo" id="rdRealizacao" value="REALIZACAO" onclick='objParcerias.fnTipo(this.value)' checked />
            <label for="rdRealizacao">Realização:</label>

            <input type="radio" name="Tipo" id="rdParceria" value="PARCERIA" onclick='objParcerias.fnTipo(this.value)' />
            <label for="rdParceria">Parceria:</label>
            </td>
            <td class="w33p">

                <div id='dvNome'>

                    <label for="txtNome">Nome:</label><br/>
                    <input type="text" name="Nome" id="txtNome" /><br/>
                </div>
                <div id='dvLink' class='dn'>
                    <label for="txtLink">Link:</label><br/>
                    <input type="url" name="Link" id="txtLink" /><br/>
                </div>

            </td>

            <td class="w33p">
                <div id='dvBreveDescr'>
                    <label for="txtAreaBreveDescricao">Breve Descrição:</label><br/>
                    <textarea class='w100p' name="Breve_Descr" id="txtAreaBreveDescricao"></textarea>
                </div>
            </td>
            </tr>        
        </table>
    </fieldset>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao" ></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objParcerias.fnShowImage(true, $('#hddID').val());" onmouseout="objParcerias.fnShowImage(false)" class="cp "></div>

    <br/><br/>

    <div class="pr">
        <div class="pa">
            <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
            <img id="imgShow" style="display: none" src="" class="boxImagem" />
        </div>
    </div>

    <br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_PARCERIA" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objParcerias.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objParcerias.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>