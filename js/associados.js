/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Associados
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

var objAssociados = function() {
    return {
        arrayNormal: {}, /* só para me situar */

        stringNormal: "", /* só para me situar */
        Init: function() {

            /* QUANDO TODO O DOCUMENTO É CARREGADO EXECUTA TODAS AS FUNÇÕES DENTRO */
            $(document).ready(function() {
                /* MASCARA CNPJ */
                $("#txtCNPJ").mask("99.999.999/9999-99");

                /* INICIALIZA O AUTOCOMPLETE */
                $('#sltEnderecos').selectToAutocomplete();
            });
        },
        fnDisplayForm: function(opt) {

            if (opt == 'exibir')
                $("form").show(100);
            else
                $("form").hide(100);

            /* DESCE PARA O FORMULÁRIO */
            $('html,body').animate({scrollTop: $("form").offset().top}, 'slow');

        },
        fnOpenFormEdit: function(id) {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddAssociado" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtNomeEmpresa").val(dados.nome_empresa);
            $("#txtCNPJ").val(dados.cnpj);
            $("#txtNomeResponsavel").val(dados.nome_responsavel);
            $("#txtEmail").val(dados.email);
            $("#sltSegmentos").val(dados.id_segmento);
            $("#hddEndereco").val(dados.id_endereco);

            /* ATRIBUI O ID NO INPUT HIDDEN */
            $("#hddID").val(id);

            /* POPULA O ENDEREÇO */
            this.fnEnderecos(dados.id_endereco);

            /* INSTANCIA OBJ CKEDITOR */
            var editor = CKEDITOR.instances['txtAreaDescricao'];

            /* DESCR */
            var descricao = $('#hddTxtAreaDescr' + id).val() != null ? $('#hddTxtAreaDescr' + id).val() : "";

            /* SET VALUE */
            editor.setData(descricao);

            /* this updates the value of the textarea from the CK instance.. */
            editor.updateElement();

            /* FILE */
            var img = (dados.img).split('/');
            $("#divImg").html(img[2]);

            $("#lblSenha").attr("title", "Se você não deseja alterar sua senha, deixe este campo em branco!");
            $("#lblConfirmaSenha").attr("title", "Se você não deseja alterar sua senha, deixe este campo em branco!");
            $("#txtSenha").attr("title", "Se você não deseja alterar sua senha, deixe este campo em branco!");
            $("#txtConfirmaSenha").attr("title", "Se você não deseja alterar sua senha, deixe este campo em branco!");

        }, /* LIMPA O FORMULÁRIO */
        fnConfereSenha: function() {
            /* VARIAVEIS */
            var senha = $("#txtSenha").val();
            var confirmacao_senha = $("#txtConfirmaSenha").val();

            /* CONFERE SE SENHA E CONFERE SENHA FORAM DIGITADOS */
            if (senha == '' && confirmacao_senha != '' || senha != '' && confirmacao_senha == '') {
                $("#txtConfirmaSenha").val("");
                $("#txtSenha").val()
                alert("Preencha corretamente os campos Senha e Confirmacao Senha!");
                return false;
            } else if (senha == '' && confirmacao_senha == '')
                return true;
            else
            /* CONFERE SE AS SENHAS SÃO IGUAIS */
            if (senha != confirmacao_senha)
                return false;
            else
                return true;
        },
        fnResetForm: function() {

            /* LIMPA OS CAMPOS */
            $("form")[0].reset();

            /* LIMPA A IMAGEM */
            $("#divImg").html("");

            /* LIMPA A TEXTAREA */
            $('#txtAreaBreveDescricao').html("");

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");

            /* OBJ CKEDITOR - LIMPA O WEBEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);
            editor.setData("");

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");

        },
        fnOpenFormInsert: function() {

            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            $("#lblSenha").attr("title", "Se deixar este campo em branco seu email será sua senha de acesso!");
            $("#lblConfirmaSenha").attr("title", "Se deixar este campo em branco seu email será sua senha de acesso!");
            $("#txtSenha").attr("title", "Se deixar este campo em branco seu email será sua senha de acesso!");
            $("#txtConfirmaSenha").attr("title", "Se deixar este campo em branco seu email será sua senha de acesso!");
        },
        fnExibeAviso: function() {
            if ($("#hddAcao").val() == 'Inserir') {

            } else if ($("#hddAcao").val() == 'Atualizar') {

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
            var condicoesCampoObrigatorio = new Array('txtNomeEmpresa', 'txtCNPJ', 'sltSegmentos', 'txtEmail', 'sltEnderecos', 'txtAreaDescricao');
            var condicoesPulaCampo = new Array('txtNomeResponsavel');

            /* VERIFICA SE HÁ CAMPOS VAZIOS E SE A SENHA FOI DIGITADA CORRETAMENTE*/
            var checkBlankField = objForm.fnFormEmptyCheck(condicoesCampoObrigatorio, condicoesPulaCampo);

            /* CHECK SE A SENHA É == A CONFIRMAÇÃO SENHA */
            var checkPassword = this.fnConfereSenha();

            /* CASO NÃO TENHA CAMPOS VAZIO, SUBMETE O FORM */
            if (checkBlankField == true && checkPassword == true)
                $("form").submit();

            return false;

        },
        fnShowImage: function(showImg, id) {

            if (showImg == true) {
                $("#imgShow").attr("src", $("#hddImg" + id).val());
                $("#imgShow").show();
                $("#lblImgShow").show();
            }
            else {
                $("#imgShow").attr("src", "");
                $("#imgShow").html("");
                $("#imgShow").hide();
                $("#lblImgShow").hide();
            }
        },
        fnEnderecos: function(value) {
            //envia os dados por POST
            jQuery.ajax({
                type: 'POST',
                url: 'views/associados/enderecos.ajax.php',
                data: {'ID_ENDERECO': value},
                beforeSend: function() {/* something */
                },
                dataType: 'html',
                success: function(data) {
                    /* TRANSFORMA EM UM JSON OBJ JS */
                    var e = eval('(' + data + ')');

                    /* PEGA O ENDEREÇO RETORNADO */
                    for (index in e) {
                        var ENDERECO = e[index];
                        var ID_ENDERECO = index;
                    }

                    /* POPULA O CAMPO ENDEREÇO */
                    $(".ui-autocomplete-input").val(ENDERECO);
                    $("#hddIdEndereco").val(ID_ENDERECO);
                    //console.log(data);
                    //return eval("(" + data + ")");

                }//fim fn success
            }); //fim POST .ajax  
        }
    };
}();

/* DOCUMENT.READY */
objAssociados.Init();