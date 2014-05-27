/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS do Apoio Juridico
 *               
 * Created on :  04/04/2014
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

var objApoio_Juridico = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {
                /* CONTENT HERE */
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
            var dados = eval("(" + $("#hddApoio_Juridico" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtTitulo").val(dados.titulo);
            $("#txtLatitude").val(dados.latitude);
            $("#txtLongitude").val(dados.longitude);

            //dados.img != "" ? $("#divImg").html(dados.img) : $("#divImg").html("");

            /* CHECK/UNCHECK CASO ATIVO */
            dados.ativo === "1" ? $("#chkAtivo").prop("checked", 'checked') : $("#chkAtivo").removeAttr("checked");

            /* ATRIBUI O ID NO INPUT HIDDEN */
            $("#hddID").val(id);

            /* OBJ CKEDITOR */
            var editor = CKEDITOR.instances['txtAreaDescricao'];
            //var editor = $('.ckeditor').ckeditorGet();

            /* DESCRIÇÃO */
            var descricao = $('#hddTxtAreaDescricao' + id).val() != null ? $('#hddTxtAreaDescricao' + id).val() : "";

            /* SET VALUE */
            editor.setData(descricao);

            /* this updates the value of the textarea from the CK instance.. */
            editor.updateElement();

            /* FILE */
            var img = (dados.img).split('/');
            $("#divImg").html(img[2]);

        }, /* LIMPA O FORMULÁRIO */
        fnResetForm: function() {

            /* LIMPA OS CAMPOS */
            $("form")[0].reset();

            /* LIMPA A IMAGEM */
            $("#divImg").html("");

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");

            /* LIMPA O ID */
            $("#ID_APOIOJURIDICO").val("");

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");

            /* OBJ CKEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);

            /* SET VALUE */
            editor.setData("");

        },
        fnOpenFormInsert: function() {

            /* OBJ CKEDITOR - LIMPA O WEBEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);
            editor.setData("");

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* LIMPA O FORMULÁRIO */
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
            var condicoesCampoObrigatorio = new Array('txtTitulo', 'txtLatitude', 'txtLongitude', 'txtAreaDescricao');
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
objApoio_Juridico.Init();