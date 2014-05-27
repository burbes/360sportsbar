/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Pessoas
 *               
 * Created on :  27/02/2014
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

var objRedeSocial = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {
                /* CONTENT  HERE */
            });
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

            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddRedeSocial" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtNome").val(dados.nome);
            $("#txtLink").val(dados.link);

            dados.ativo === '1' ? $("#chkAtivo").prop("checked", 'checked') : $("#chkAtivo").removeAttr("checked");

            /* ATRIBUI O ID NO INPUT HIDDEN */
            $("#hddID").val(id);

            /* FILE */
            var img = (dados.img).split('/');
            $("#divImg").html(img[2]);

        },
        fnResetForm: function() {

            /* LIMPA OS CAMPOS */
            $("form")[0].reset();

            /* LIMPA A IMAGEM */
            $("#divImg").html("");

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");
        },
        fnOpenFormInsert: function() {
            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');
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
            var condicoesCampoObrigatorio = new Array('txtNome', 'txtLink');
            var condicoesPulaCampo = new Array();

            /* VERIFICA SE HÁ CAMPOS VAZIOS E SE A SENHA FOI DIGITADA CORRETAMENTE*/
            var checkBlankField = objForm.fnFormEmptyCheck(condicoesCampoObrigatorio, condicoesPulaCampo);

            /* CASO NÃO TENHA CAMPOS VAZIO, SUBMETE O FORM */
            if (checkBlankField == true)
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
                $("#imgShow").hide();
                $("#lblImgShow").hide();
            }


        }
    };
}();

/* DOCUMENT.READY */
objRedeSocial.Init();