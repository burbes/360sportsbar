/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Usuários
 *               
 * Created on :  20/02/2014
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

var objUsuarios = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {

            $(document).ready(function() {

                /* MASCARAS */
                $("#txtCpf").mask("999.999.999-99");
                $("#txtData_Nascimento").mask("99/99/9999");
                $("#txtTelefone_Celular").mask("(99) 9?9999-9999");
                $("#txtTelefone_Fixo").mask("(99) 9?9999-9999");
                $("#txtTelefone_Comercial").mask("(99) 9?9999-9999");
                $("#txtCepCobranca").mask("99999-999");
                $("#txtCepEntrega").mask("99999-999");
            });
            /* CONTENT HERE */
        },
        fnDisplayForm: function(opt) {

            if (opt == 'exibir')
                $("form").show(500);
            else
                $("form").hide(500);

            /* DESCE PARA O FORMULÁRIO */
            $('html,body').animate({scrollTop: $("form").offset().top}, 'slow');

        },
        fnOpenFormEdit: function(id) {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");
            
            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddUsuario" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtNome").val(dados.NOME);
            $("#txtEmail").val(dados.EMAIL);
            $("#hddID").val(id);
            $("#txtApelido").val(dados.APELIDO);
            $("#txtRg").val(dados.RG);
            $("#txtCpf").val(dados.RG);
            $("#txtData_Nascimento").val(dados.DATA_NASCIMENTO);
            $("#txtTelefone_Celular").val(dados.TELEFONE_CELULAR);
            $("#txtTelefone_Fixo").val(dados.TELEFONE_FIXO);
            $("#txtTelefone_Comercial").val(dados.TELEFONE_COMERCIAL);
            $('input:radio[name=Sexo]').filter('[value=' + dados.SEXO + ']').prop('checked', true);
            $('input:radio[name=id_tipo_usuario]').filter('[value=' + dados.ID_TIPO_USUARIO + ']').prop('checked', true);
            $("input[name=id_tipo_usuario]:checked").val(dados.ID_TIPO_USUARIO);
            $("#txtEnderecoCobranca").val(dados.ENDERECO_COBRANCA);
            $("#txtNumeroCobranca").val(dados.NUMERO_COBRANCA);
            $("#txtComplementoCobranca").val(dados.COMPLEMENTO_COBRANCA);
            $("#txtCepCobranca").val(dados.CEP_COBRANCA);
            $("#txtCidadeCobranca").val(dados.CIDADE_COBRANCA);
            $("#txtUfCobranca").val(dados.UF_COBRANCA);
            $("#txtEnderecoEntrega").val(dados.ENDERECO_ENTREGA);
            $("#txtNumeroEntrega").val(dados.NUMERO_ENTREGA);
            $("#txtComplementoEntrega").val(dados.COMPLEMENTO_ENTREGA);
            $("#txtCepEntrega").val(dados.CEP_ENTREGA);
            $("#txtCidadeEntrega").val(dados.CIDADE_ENTREGA);
            $("#txtUfEntrega").val(dados.UF_ENTREGA);

            /* CHECK/UNCHECK CASO ATIVO */
            dados.ATIVO == "1" ? $("#chkAtivo").prop("checked", 'checked') : $("#chkAtivo").removeAttr("checked");
            dados.NEWSLETTER == "1" ? $("#chkNewsletter").prop("checked", 'checked') : $("#chkNewsletter").removeAttr("checked");

        },
        fnOpenFormInsert: function() {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();

        },
        fnResetForm: function() {

            /* LIMPA OS CAMPOS */
            $("form")[0].reset();

            /* LIMPA O INPUT HIDDEN ID */
            //$("#hddID").val("");

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");

        },
        fnCheckPass: function(pass) {

            if (pass) {
                $("#txtConfirmaSenha").attr("disabled", false);
                return true;
            } else {
                $("#txtConfirmaSenha").val("");
                $("#txtConfirmaSenha").attr("disabled", true);
                return false;
            }
        },
        fnConfirmPassword: function(pass1, pass2) {
            if (pass1 != '' && pass2 != '')
                /* VERIFICA SE AS SENHAM CONFERE */
                if (pass1 != pass2) {
                    alert("Senhas não confere");

                    /* LIMPA OS CAMPOS */
                    $("#txtConfirmaSenha").val('');
                    $("#txtSenha").val('');
                    $("#hddSenha").val('');
                    return false;
                } else {
                    $("#hddSenha").val($.md5(pass1));
                    return true;
                }

        },
        fnDelete: function(id) {
            if (!confirm("Você tem certeza que deseja remover o registro?"))
                return false;

            /* ATRIBUI A AÇÃO REMOVER AO INPUT HIDDEN */
            $("#hddAcao").val('Remover');

            /* ATRIBUI O ID PARA O INPUT HIDDEN */
            $("#hddID").val(id);

            /* SUBMIT */
            $("form").submit();
        },
        fnSubmitForm: function() {

            /* CAMPOS OBRIGATORIOS */
            var condicoesCampoObrigatorio = new Array('txtNome', 'txtEmail');
            var condicoesPulaCampo = new Array();

            /* VERIFICA SE HÁ CAMPOS VAZIOS E SE A SENHA FOI DIGITADA CORRETAMENTE*/
            var checkBlankField = objForm.fnFormEmptyCheck(condicoesCampoObrigatorio, condicoesPulaCampo);

            /* CASO NÃO TENHA CAMPOS VAZIO, SUBMETE O FORM */
            if (checkBlankField == true)
                $("form").submit();

            return false;
        },
        fnCopiaEndereco: function(obj) {

            var checked = $(obj).prop('checked');

            if (checked == true) {
                $('#txtEnderecoEntrega').val($('#txtEnderecoCobranca').val());
                $('#txtNumeroEntrega').val($('#txtNumeroCobranca').val());
                $('#txtComplementoEntrega').val($('#txtComplementoCobranca').val());
                $('#txtCepEntrega').val($('#txtCepCobranca').val());
                $('#txtCidadeEntrega').val($('#txtCepCobranca').val());
                $('#txtUfEntrega').val($('#txtUfCobranca').val());
            } else {
                $('#txtEnderecoEntrega').val('');
                $('#txtNumeroEntrega').val('');
                $('#txtComplementoEntrega').val('');
                $('#txtCepEntrega').val();
                $('#txtCidadeEntrega').val('');
                $('#txtUfEntrega').val('');
            }
        }
    };
}();

/* DOCUMENT.READY */
objUsuarios.Init();