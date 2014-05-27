/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS das msg de
 *               envio dos contato
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

var objContato = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {
            $(document).ready(function() {
                /* CONTENT HERE */
            });
        },
        fnOpenFormEdit: function(id) {

            /* TRANSFORMA EM UM OBJ */
            var dados = eval("(" + $("#hddContato" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#spEmail").html(dados.email);
            $("#spTelefone").html(dados.telefone);
            $("#spSetor").html(dados.setor);
            $("#spNome").html(dados.nome);
            $("#spAssunto").html(dados.assunto);

            /* DESCRIÇÃO */
            var descricao = $('#hddTxtAreaDescricao' + id).val() != null ? $('#hddTxtAreaDescricao' + id).val() : "";

            $("#spDescricao").html(descricao);

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
        }

    };
}();

/* DOCUMENT.READY */
objContato.Init();