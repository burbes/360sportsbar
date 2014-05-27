<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Contato
 *               
 * Created on :  15/04/2014
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

<form action="" method="post" name="contato_form">


    <fieldset>
        <legend>Dados Contato</legend>
        <table class="w100p">
            <tr>
            <td class="w50p">

            <label >Email:</label>
            <span id="spEmail"></span>

            <br/>

            <label >Telefone:</label>
            <span id="spTelefone"></span>            

            <br/>

            <label >Setor:</label>
            <span id="spSetor"></span> 

            </td>

            <td class="w50p">

            <label >Nome:</label>
            <span id="spNome"></span>

            <br/>

            <label >Assunto:</label>
            <span id="spAssunto"></span>

            </td>
            </tr>
        </table>
    </fieldset>

    <label >Texto:</label>
    <span id="spDescricao"></span>    

    <br/>

    <div class="cb">&nbsp;</div>        

</form>