<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Eventos
 *               
 * Created on :  07/04/2014
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

<link href="css/eventos.css" rel="stylesheet" type="text/css"/>

<form action="" method="post" name="eventos_form" style="/*display: none;*/"  enctype="multipart/form-data" >

    <fieldset>

        <legend>Dados do Evento</legend>

        <table border="0" class="w100p">

            <tr>
            <td class="w50p">

                <table class="w100p">

                    <tr>
                    <td class="w50p">
                    <label for="txtTitulo">Titulo:</label><br/>
                    <input type="text" name="Titulo" id="txtTitulo" /><br/>

                    <label for="txtContato">Contato:</label><br/>
                    <input type="text" name="Contato" id="txtContato" /><br/>

                    <label for="txtLocal">Local:</label><br/>
                    <input type="text" name="Local" id="txtLocal" />
                    </td>
                    
                    <td class="w50p">
<!--                    <input type="radio" name="Tipo" id="rdRealizacao" value="REALIZACAO" checked />
                    <label for="rdRealizacao">Realização:</label>

                    <br/>

                    <input type="radio" name="Tipo" id="rdParceria" value="PARCERIA" />
                    <label for="rdParceria">Parceria:</label>

                    <br/><br/>
                        -->

                    <label for="chkAtivo">Ativo:</label>
                    <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />

                    </td>
                    </tr>
                </table>                
            </td>

            <td class="w50p">
            <label for="txtDataHora">Data Evento:</label><br/>
            <input type="text" name="DataHora" id="txtDataHora" value="<?php echo date('d/m/Y'); ?>" class="tcal"  /><br/>

            <label for="txtAreaBreveDescricao">Breve Descrição:</label><br/>
            <textarea name="Breve_Descr" id="txtAreaBreveDescricao"></textarea>
            </td>
            </tr>        
            </table>
        </fieldset>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao" ></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objEventos.fnShowImage(true, $('#hddID').val());" onmouseout="objEventos.fnShowImage(false)" class="cp "></div>

    <br/>

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
    <input type="hidden" name="ID_EVENTO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objEventos.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objEventos.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>