<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Associados
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


<form action="" method="post" name="associados_form" style="display: none;"  enctype="multipart/form-data" >


    <fieldset>
        <legend>Dados do Associado</legend>
        <div class="w100p"> 
            <div class="pr fl w50p ">
                <label for="txtNomeEmpresa">Nome da Empresa:</label><br/>
                <input type="text" name="Nome_Empresa" id="txtNomeEmpresa" class="w300px" /><br/>

                <label for="txtCNPJ">CNPJ:</label><br/>
                <input type="text" name="CNPJ" id="txtCNPJ" class="w300px" placeholder="99.999.999/9999-99" /><br/>

                <label for="txtNomeResponsavel">Nome do Responsável:</label><br/>
                <input type="text" name="Nome_Responsavel" id="txtNomeResponsavel" class="w300px" /><br/>

                <label for="sltSegmentos">Segmentos:</label><br/>
                    <select name="ID_SEGMENTO" id="sltSegmentos" autofocus="autofocus" class="w300px" >
                    <option value=''>&nbsp;</option>
                    <?php
                    echo Associados::selectOptionSegmentos();
                    ?>
                </select>

            </div>
            <div class="pr fl w50p">
                <label for="txtEmail">Email:</label><br/>
                <input type="email" name="Email" id="txtEmail" class="w300px" /><br/>

                <table>
                    <tr>
                    <td>
                    <label id='lblSenha' for="txtSenha" style='cursor: help'>Senha:</label><br/>
                    <input type="password" name="Senha" id="txtSenha" class="w100p" title=''  /><br/>
                    </td>
                    <td>
                    <label id='lblConfirmaSenha' for="txtConfirmaSenha" title='' style='cursor: help'>Confirmar Senha:</label><br/>
                    <input type="password" id="txtConfirmaSenha" class="w150px" title=''/><br/>
                    </td>
                    </tr>
                </table>

                <!-- ENDEREÇO - AUTOCOMPLETE -->
                <div style="position: relative; height: 80px;">
                    <label for="sltEnderecos">Endereço:</label><br/>
                    <select id="sltEnderecos" autofocus="autofocus" autocorrect="off" autocomplete="off" >
                        <option value=''>&nbsp;</option>
                        <?php
                        echo Associados::selectOptionEnderecos();
                        ?>
                    </select>

                </div>             
                <script>
                </script>
                <!-- FIM - ENDEREÇO - AUTOCOMPLETE -->
            </div>
        </div>

    </fieldset>

    <br/>

    <label for="txtAreaDescricao">Descrição:</label>
    <textarea class="ckeditor"  name="Descricao" id="txtAreaDescricao" ></textarea>

    <br/>

    <label for="txtImagem">Imagem:</label>
    <input type="file" name="file" id="txtImagem" />
    <div id="divImg" onmouseover="objAssociados.fnShowImage(true, $('#hddID').val());" onmouseout="objAssociados.fnShowImage(false)" class="cp "></div>

    <br/>

    <div class="pr">
        <div class="pa">
            <label for="imgShow" id="lblImgShow" style="display: none">Imagem Existente:</label>
            <img id="imgShow" style="display: none" src="" class="boxImagem" />
        </div>
    </div>

    <br/>

    <!-- ID DO ENDEREÇO -->
    <input type="hidden" id="hddIdEndereco" name="ID_ENDERECO" value="" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_ASSOCIADO" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objAssociados.fnSubmitForm();" />
    
    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objAssociados.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
</form>