<?php
/*
 * ***********************************************
 * Objetivo:     Formulário de Cadastro de Usuários
 *               
 * Created on :  21/02/2014
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

<form action='' method='post' name='usuarios_form' style='/*display: none;*/' >

    <table class='w100p'>
        <tr>            
        <td class='w50p'>

        <fieldset class='h350px'>
            <legend>Dados do Usuário</legend>


            <label for='txtNome'>Nome Completo:</label>
            <input type='text' name='Nome' id='txtNome' maxlength='100'/>

            <br/>

            <label for='txtEmail'>Email:</label>
            <input type='email' name='Email' id='txtEmail' maxlength='50'/>

            <br/>

            <label for='txtSenha'>Senha:</label>
            <input type='password' id='txtSenha' onkeypress='objUsuarios.fnCheckPass(this.value);' onblur='
                    objUsuarios.fnCheckPass(this.value);
                    objUsuarios.fnConfirmPassword(this.value, $("#txtConfirmaSenha").val())' maxlength='8'/>

            <br/>

            <label for='txtConfirmaSenha'>Confirmar Senha:</label>
            <input type='password' id='txtConfirmaSenha' disabled='disabled'  onblur='objUsuarios.fnCheckPass(this.value);
                    objUsuarios.fnConfirmPassword($("#txtSenha").val(), this.value);
                    objUsuarios.fnCheckPass(this.value);' maxlength='8'/>

            <br/>

            <label for='txtApelido'>Apelido:</label>
            <input type='text' name='Apelido' id='txtApelido' maxlength='20' />

            <br/>

            <label for='txtRg'>Rg:</label>
            <input type='text' name='Rg' id='txtRg' onkeypress="return fnSomenteNumero(event);" maxlength="11"/>
        
            <br/>

            <label for='txtCpf'>Cpf:</label>
            <input type='text' name='Cpf' id='txtCpf' />

            <br/>

            <label for='txtData_Nascimento'>Data Nascimento:</label>
            <input type='date' name='Data_Nascimento' id='txtData_Nascimento' />

            <br/>

            <label for='txtTelefone_Celular'>Telefone Celular:</label>
            <input type='tel' name='Telefone_Celular' id='txtTelefone_Celular' />

            <br/>

            <label for='txtTelefone_Fixo'>Telefone Fixo:</label>
            <input type='tel' name='Telefone_Fixo' id='txtTelefone_Fixo' />

            <br/>

            <label for='txtTelefone_Comercial'>Telefone Comercial:</label>
            <input type='tel' name='Telefone_Comercial' id='txtTelefone_Comercial' />

            <br/>

            <label>Sexo:</label>
            <input type='radio' name='Sexo' id='txtMasculino' value='1' checked/>
            <label for='txtMasculino'>Masculino</label>
            <input type='radio' name='Sexo' id='txtFeminino' value='0'/>
            <label for='txtFeminino'>Feminino</label> <br/>

            <br/>

            <label for='chkNewsletter'>Newsletter:</label>
            <input type='checkbox' name='Newsletter' id='chkNewsletter' value='1' checked />

            <br/>

            <label for='chkAtivo'>Ativo:</label>
            <input type='checkbox' name='Ativo' id='chkAtivo' value='1' checked />

            <br/><br/>

            <label>Tipo de Usuário:</label>
            <input type='radio' name='id_tipo_usuario' id='txtAdministrador' value='1' checked/>
            <label for='txtAdministrador'>Administrador</label>
            <input type='radio' name='id_tipo_usuario' id='txtOperador' value='2'/>
            <label for='txtOperador'>Operador</label>
            <input type='radio' name='id_tipo_usuario' id='txtUsuario' value='3'/>
            <label for='txtUsuario'>Usuario</label> <br/>
        </fieldset>

        </td>

        <td class='w50p'>

        <fieldset class='h150px'>
            <legend>Endereço de Cobrança</legend>

            <label for='txtEnderecoCobranca'>Endereco:</label>
            <input type='text' name='Endereco_Cobranca' id='txtEnderecoCobranca' maxlength='255'/>

            <br/>

            <label for='txtNumeroCobranca'>N°:</label>
            <input type='number' name='Numero_Cobranca' id='txtNumeroCobranca' maxlength='15'/>

            <br/>

            <label for='txtComplementoCobranca'>Complemento:</label>
            <input type='text' name='Complemento_Cobranca' id='txtComplementoCobranca' maxlength='100'/>

            <br/>

            <label for='txtCepCobranca'>CEP:</label>
            <input type='text' name='Cep_Cobranca' id='txtCepCobranca' />

            <br/>

            <label for='txtCidadeCobranca'>Cidade:</label>
            <input type='text' name='Cidade_Cobranca' id='txtCidadeCobranca' maxlength='100'/>

            <br/>

            <label for='txtUfCobranca'>UF:</label>
            <input type='text' name='Uf_Cobranca' id='txtUfCobranca' maxlength='2'/>
        </fieldset>

        <br/>

        <label for='txtIdem' >Idem</label>
        <input type='checkbox' id='txtIdem' onclick='objUsuarios.fnCopiaEndereco(this);' />

        <br/>

        <fieldset class='h155px'>
            <legend>Endereço de Entrega</legend>

            <label for='txtEnderecoEntrega'>Endereco:</label>
            <input type='text' name='Endereco_Entrega' id='txtEnderecoEntrega' maxlength='255'/>

            <br/>

            <label for='txtNumeroEntrega'>N°:</label>
            <input type='number' name='Numero_Entrega' id='txtNumeroEntrega' maxlength='15'/>

            <br/>

            <label for='txtComplementoEntrega'>Complemento:</label>
            <input type='text' name='Complemento_Entrega' id='txtComplementoEntrega' maxlength='100'/>

            <br/>

            <label for='txtCepEntrega'>CEP:</label>
            <input type='text' name='Cep_Entrega' id='txtCepEntrega' maxlength='10'/>

            <br/>

            <label for='txtCidadeEntrega'>Cidade:</label>
            <input type='text' name='Cidade_Entrega' id='txtCidadeEntrega' maxlength='100'/>

            <br/>

            <label for='txtUfEntrega'>UF:</label>
            <input type='text' name='Uf_Entrega' id='txtUfEntrega' maxlength='2'/>
        </fieldset>
        </td>

        </tr>

    </table>

    <br/>

    <!-- ID DO REGISTRO A SER EDITADO -->
    <input type='hidden' name='ID_USUARIO' id='hddID' value='' />

    <!-- AÇÃO A SER TOMADA (INSERIR/EDITAR/REMOVER) -->
    <input type='hidden' name='Acao' id='hddAcao' value='' />

    <!-- SENHA CRIPTOGRAFADA -->
    <input type='hidden' name='Senha' id='hddSenha' value='' />

    <!-- DATA DE MODIFICAÇÃO/INSERÇÃO -->
    <input type='hidden' name='DATA_MODIFICACAO' value='<?php echo date('Y-m-d') ?>' />

    <!-- BOTÃO SUBMIT -->
    <input type='button' id='btnSalvar' value='Salvar' onclick='objUsuarios.fnSubmitForm();' />

    <!-- BOTÃO LIMPAR -->
    <input type='reset' id='btnLimpar' value='Limpar' />

    <!-- IMPEDINDO SPOOFING DE FORMULÁRIO -->
    <input type='hidden' name='token' value='<?php echo $token; ?>' />
</form>