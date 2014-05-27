/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Segmentos
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

var objSegmentos = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {
                /* DESCE PARA O FORMULÁRIO */
                $('html,body').animate({scrollTop: $("form").offset().top}, 'slow');
            });
        },
        fnDisplayForm: function(opt) {

            if (opt == 'exibir')
                $("form").show(500);
            else
                $("form").hide(500);

            /* DESCE PARA O FORMULÁRIO */
            $('html,body').animate({scrollTop: $("fieldset").offset().top}, 'slow');

        },
        fnOpenFormEdit: function(id) {

            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddSegmento" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtTitulo").val(dados.titulo);
            $("#txtBreveDescricao").val(dados.breve_descr);
            $("#txtCor").val(dados.cor);
            $("#hddID").val(id);

            /* CHECK/UNCHECK CASO ATIVO */
            dados.ativo === '1' ? $("#chkAtivo").prop("checked", 'checked') : $("#chkAtivo").removeAttr("checked");

            /* ATRIBUI O ID NO INPUT HIDDEN */
            $("#hddID").val(id);

            /* OBJ CKEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);

            /* GET VALUE DESCRIÇÃO - FIZ EM UM HDD SEPARADO POR CAUSA DE CARACTERES ESPECIAIS */
            var descricao = $("#hddTxtAreaDescricao" + id).val();

            /* CHKEDITOR SET VALUE */
            editor.setData(descricao);

            /* FILE */
            var img = (dados.img).split('/');
            $("#divImg").html(img[2]);
        },
        fnResetForm: function() {

            /* LIMPA O FORMULÁRIO */
            $("form")[0].reset();

            /* LIMPA A IMAGEM */
            $("#divImg").html("");

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");

            /* LIMPA O ID */
            $("#ID_SEGMENTO").val("");

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");

            /* OBJ CKEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);

            /* SET VALUE */
            editor.setData("");
        },
        fnOpenFormInsert: function() {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* LIMPA O FORMULARIO */
            this.fnResetForm();
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
            var condicoesCampoObrigatorio = new Array('txtTitulo', 'txtCor', 'txtBreveDescricao');
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
                $("#imgShow").html("");
                $("#imgShow").hide();
                $("#lblImgShow").hide();
            }


        }
    };
}();

/* DOCUMENT.READY */
objSegmentos.Init();