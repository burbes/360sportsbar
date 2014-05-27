/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS das Categorias
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

var objCategorias = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {

                /* PAGINAÇÃO */
                $('#paging_container').pajinate({
                    wrap_around: true,
                    items_per_page: 15,
                    abort_on_small_lists: true,
                    nav_label_first: '<<',
                    nav_label_last: '>>',
                    nav_label_prev: '<',
                    nav_label_next: '>'
                });
                /* END PAGINAÇÃO */

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

            /* ATRIBUI O VALOR ATUALIZAR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Atualizar");

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddCategoria" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtNome").val(dados.nome);
            $("#hddID").val(id);

            /* CHECK/UNCHECK CASO ATIVO */
            if (dados.ativo == 1)
                $("#chkAtivo").prop("checked", 'checked');
            else
                $("#chkAtivo").removeAttr("checked");
        },
        fnOpenFormInsert: function() {

            /* EXIBE O FORMULÁRIO */
            this.fnDisplayForm('exibir');


            /* LIMPA O FORMULÁRIO */
            $("form")[0].reset();

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");


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

            /* VERIFICA SE HÁ CAMPOS VAZIOS */
            var check = objForm.fnFormEmptyCheck();

            /* CASO NÃO TENHA CAMPOS VAZIO, SUBMETE O FORM */
            if (check == true)
                $("form").submit();

            return false;
        }
    };
}();

/* DOCUMENT.READY */
objCategorias.Init();