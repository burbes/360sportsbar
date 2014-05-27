/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Parcerias
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

var objParcerias = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        tipo: '', /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {
                /* content here */
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

            /* EXIBE O FORMULÁRIO TODO */
            this.fnDisplayForm('exibir');

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddParceria" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtNome").val(dados.nome);
            $("#txtLink").val(dados.link);
            $("input:radio[name=Tipo]").filter('[value="' + dados.tipo + '"]').attr('checked', true);
            $("#hddID").val(id);

            /* OBJ CKEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);
            //var editor = $('.ckeditor').ckeditorGet();

            /* GET VALUE DESCRIÇÃO - FIZ EM UM HDD SEPARADO POR CAUSA DE CARACTERES ESPECIAIS */
            var breveDescricao = $("#hddTxtAreaBreveDescr" + id).val();
            var descricao = $("#hddTxtAreaDescricao" + id).val();

            $("#txtAreaBreveDescricao").val(breveDescricao);

            /* SET VALUE */
            editor.setData(descricao);

            /* FILE */
            var img = (dados.img).split('/');
            $("#divImg").html(img[2]);
            console.log(dados.tipo);
            /* DPS DE EXIBIDO TODO O REL, É DEFINIDO QUAL É O TIPO DO RELATORIO A SER EXIBIDO */
            this.fnTipo(dados.tipo);
        },
        fnOpenFormInsert: function() {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');

            /* LIMPA O FORMULÁRIO */
            this.fnResetForm();
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
            var condicoesCampoObrigatorio = new Array('');
            var condicoesPulaCampo = new Array('');

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
        },
        fnTipo: function(opt) {
            switch (opt) {
                case 'PARCERIA':
                    $('#cke_txtAreaDescricao').hide(500);
                    $('#dvNome').hide(500);
                    $('#dvBreveDescr').hide(500);
                    $('#dvLink').show(500);
                    break;
                case 'REALIZACAO':
                    $('#cke_txtAreaDescricao').show(500);
                    $('#dvLink').hide(500);
                    $('#dvNome').show(500);
                    $('#dvBreveDescr').show(500);
                    break;
            }

        }
    };
}();

/* DOCUMENT.READY */
objParcerias.Init();