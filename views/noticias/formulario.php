<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Noticias
 *               
 * Created on :  19/03/2014
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

<form action="" method="post" name="noticias_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>

        <legend>Dados Noticias</legend>

        <table class="w100p" >
            <tr>
            <td class="w50p">


            <label for="txtTitulo">Titulo:</label>
            <input type="text" name="Titulo" id="txtTitulo" />

            <br/>

            <label for="txtLink">Link:</label>
            <input type="url" name="Link" placeholder='http://' id="txtLink" />

            <br/>

            <label for="txtSegmentos">Segmentos:</label>
            <select id="sltSegmentos" name="ID_SEGMENTO" >
                <option value="" ></option>
                <?php
                $segmentos = Noticias::segmentos();

                for ($i = 0; $i < count($segmentos['id_segmento']); $i++) {
                    echo "<option value='{$segmentos["id_segmento"][$i]}'  >{$segmentos['titulo'][$i]}</option>";
                }
                ?>
            </select>            
            </td>
            <td class="w50p">

            <label for="txtAutor">Autor:</label>
            <input type="text" name="Autor" id="txtAutor" value=""/>

            <br/>

            <label for="txtDataHora">Data Notícia:</label>
            <input type="text" name="DataHora" id="txtDataHora" value="<?php echo date('d/m/Y'); ?>" class="tcal"  />

            </td>
            </tr>
        </table>

    </fieldset>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao"></textarea>

<!--
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
    </table>-->

    <br/>

    <label for="chkAtivo">Ativo:</label>
    <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked />

    <br/>
    

    <div id="dvGaleria" class="pr">
        <img id="imgGaleria"  src="" class="dn pa"/>
    </div>

    <div id="dvGaleriaImgs">&nbsp;</div>

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

    <!--    <div id="upload" class="demo dn" style="display: none">
            <div class="demo-box">
                <div id="status-message"><span></span><span>Selecione o(s) arquivo(s) que deseja enviar:</span></div>
                <div id="custom-queue"></div>
                <input id="file_upload" type="file" name="file_galeria"/> 
                 <a id="comecar-upload" class="cp"><i class="fa fa-upload"></i> Começar Upload</a>  
            </div>
        </div>-->

    <div class="cb">&nbsp;</div>        

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objNoticias.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objNoticias.fnResetForm()" />


    <!-- ARQUIVOS -->
    <!--<input type="hidden" name="ARQUIVOS" id="ARQUIVOS" value="" />-->

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_NOTICIA" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

</form>