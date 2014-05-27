<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Cardapios
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

<form action="" method="post" name="cardapios_form" style="display: none;" enctype="multipart/form-data">

    <fieldset>
        <legend>Dados do Cardapio</legend>
        
            <label for="txtNome">Nome:</label><br/>
            <input type="text" name="Nome" id="txtNome" />

            <br/>

            <label for="sltTipos">Tipos:</label><br/>
<!--                <select name="ID_TIPO[]" id="sltTipos" >
                <option value=''>&nbsp;</option>-->
            <?php
            echo Cardapios::selectOptionTipos();
            ?>

            <!--            </select>-->

            <br/>

            <div id="dvBebidas">

                <label for="sltBebidas">Bebidas:</label><br/>
                <select multiple name="ID_BEBIDA[]" id="sltBebidas" >
                    <option value=''>&nbsp;</option>
                    <?php
                    echo Cardapios::selectOptionBebidas();
                    ?>

                </select>

                <br/>

            </div>
            <div  id="dvComidas" class="dn">

                <label for="sltComidas">Comidas:</label><br/>
                <select multiple name="ID_COMIDA" id="sltComidas" >
                    <option value=''>&nbsp;</option>
                    <?php
                    echo Cardapios::selectOptionComidas();
                    ?>

                </select>

                <br/>
            </div>

            <label for="chkAtivo">Ativo:</label>
            <input type="checkbox" name="Ativo" id="chkAtivo" value="1" checked="checked" />
            

    </fieldset>

    <br/><br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type="hidden" name="ID_BEBIDA" id="hddID" value="" />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type="hidden" name="Acao" id="hddAcao" value="" />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type="hidden" name="DATA_MODIFICACAO" value="<?php echo date('Y-m-d') ?>" />

    <!-- BOTÃO SUBMIT -->
    <input type="button" id="btnSalvar" value="Salvar" onclick="objCardapios.fnSubmitForm();" />

    <!-- BOTÃO LIMPAR -->
    <input type="reset" id="btnLimpar" value="Limpar" onclick="objCardapios.fnResetForm()" />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type="hidden" name="token" value="<?php echo $token; ?>" />

    <!-- ID DO USUARIO QUE EFETUA A AÇÃO -->
    <input type="hidden" name="ID_USUARIO" id="hddID_USUARIO" value="<?php echo $_SESSION["id"] ?>" />
</form>