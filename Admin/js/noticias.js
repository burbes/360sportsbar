/*
 * ***********************************************
 * Objetivo:     Carrega as funções JS dos Noticias
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

var objNoticias = function() {
    return {
        arrayNormal: {}, /* só para me situar */
        stringNormal: "", /* só para me situar */
        Init: function() {

            $(document).ready(function() {
                /* CONTENT HERE */
            });



        },
        fnDuplicaFile: function(opt) {

            /* pega o id do ultimo elemento */
            var idLastElement = $('#upload div:last').attr("id");

            /* pega o numero do ultimo elemento */
            var numLastElement = idLastElement.substring(5, 7).trim();

            switch (opt) {
                case '+':
                    /* incrementa + 1 */
                    numLastElement++;

                    /* anexa */
                    $('#upload').append('<div id="dvImg' + numLastElement + '">\n\
                                            <input type="file" id="Imagem' + numLastElement + '" name="ARQUIVOS[]" />\n\
                                         </div>');

                    break;
                case '-':
                    if (numLastElement > 1)
                        /* remove o ultimo elemento */
                        $('#dvImg' + numLastElement).remove();
//                    else
//                        alert("Ultimo elemento não pode ser removido.");
                    break;
            }

        },
        fnDisplayUpload: function(obj) {

            if ($(obj).prop("checked") == true)
                $("#upload").show(1000);
            else
                $("#upload").hide(1000);

        },
        fnUploadGaleria: function() {

            /* CONTADOR */
            var count = 0;

            /* CONTA QUANTOS ARQUIVOS SERÃO UPADOS */
            $("#custom-queue > div").each(function() {
                count++;
            });

            /* CASO TENHA ARQUIVO PARA SER UPADO, É EXECUTADA A FUNÇÃO */
            if (count > 0) {
                $("#file_upload").uploadifyUpload();
                return true
            } else {
                return false;
            }


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
            var dados = eval("(" + $("#hddNoticia" + id).val() + ")");

            /* ATRIBUI OS VALORES */
            $("#txtTitulo").val(dados.titulo);
            $("#txtLink").val(dados.link);
            $("#txtAutor").val(dados.autor);
            $("#sltSegmentos").val(dados.segmento);
            $("#txtDataHora").val(dados.datahora);

            /************* POPULANDO GALERIA *************/
            var qtdeImagens = dados.fotos.img != null ? dados.fotos.img.length : 0;//retorna qtde de imagens da galeria

            if (qtdeImagens > 0)
            {
                var imagens = "";

                for (var i = 0; i < qtdeImagens; i++) {
                    imagens += "    <div id='Foto" + dados.fotos.id_foto[i] + "'>\n\
                                        Nome do Arquivo: <span onmouseover='objNoticias.fnShowImage(true,\"" + dados.fotos.img[i] + "\",\"galeria\");' onmouseout='objNoticias.fnShowImage(false, null, \"galeria\")' class='cp '>" + dados.fotos.img[i] + "</span> \n\
                                        <a onclick=\"objNoticias.fnExcluirFoto('" + dados.fotos.id_foto[i] + "', '" + dados.id_noticia + "')\">Excluir</a>\n\
                                    </div>";
                }
                $("#dvGaleriaImgs").append(imagens);
            }
            /************* FIM GALERIA *************/

            /* CHECK/UNCHECK CASO ATIVO */
            dados.ativo === "1" ? $("#chkAtivo").prop("checked", 'checked') : $("#chkAtivo").removeAttr("checked");
            dados.galeria === "1" ? $("#chkGaleria").prop("checked", 'checked') : $("#chkGaleria").removeAttr("checked");
            this.fnDisplayUpload($("#chkGaleria"));

            /* ATRIBUI O ID NO INPUT HIDDEN */
            $("#hddID").val(id);

            /* OBJ CKEDITOR */
            var editor = (CKEDITOR.instances['txtAreaDescricao']);
            //var editor = $('.ckeditor').ckeditorGet();

            /* DESCRIÇÃOS */
            var descricao = $('#hddTxtAreaDescricao' + id).val() != null ? $('#hddTxtAreaDescricao' + id).val() : "";

            /* SET VALUE */
            editor.setData(descricao);

            /* this updates the value of the textarea from the CK instance.. */
            editor.updateElement();

            /* FILE */
            var img = (dados.img).split('/');

            if (dados.img != "")
                $("#divImg").html(img[2]);

        },
        /* LIMPA O FORMULÁRIO */
        fnResetForm: function() {

            /* LIMPA OS CAMPOS */
            $("form")[0].reset();

            /* LIMPA A IMAGEM */
            $("#divImg").html("");
            $("#dvGaleria").html('<img id="imgGaleria" class="dn pa" src="">');
            $("#dvGaleriaImgs").html("");

            /* LIMPA O INPUT HIDDEN ID */
            $("#hddID").val("");

            /* DEPOIS DE $.RESET O FORM, A GALERIA FICA chkGaleria = 0, ENTÃO ESCONDE A BOX GALERIA */
            this.fnDisplayUpload($("#chkGaleria"));

            /* ATRIBUI O VALOR INSERIR P/ O INPUT HIDDEN */
            $("#hddAcao").val("Inserir");

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
        fnExcluirFoto: function(id_foto, id_noticia) {
            if (!confirm("Você tem certeza que deseja remover a foto ?"))
                return false;

            //envia os dados por POST
            jQuery.ajax({
                type: 'POST',
                url: './views/noticias/excluiFoto.ajax.php',
                data: {
                    "id_foto": id_foto,
                    "id_noticia": id_noticia
                },
                dataType: 'html',
                success: function(data) {
                    //transforma a string retornada e transforma em um obj.                    
                    var e = eval("(" + data + ")");
                    var msg = "";
                    var resultado = e.ok;

                    if (resultado == true) {
                        msg = "Foto excluida com sucesso!";
                        $("#Foto" + id_foto).html("");
                    } else
                        msg = "Erro ao excluir foto! ";

                    alert(msg);
                    return;

                }//fim fn success
            });//fim POST .ajax  
        },
        fnSubmitForm: function() {

            /* CAMPOS OBRIGATORIOS */
            var condicoesCampoObrigatorio = new Array('txtTitulo', 'txtLink', 'sltSegmentos', 'txtAutor');
            var condicoesPulaCampo = new Array();

            /* VERIFICA SE HÁ CAMPOS VAZIOS E SE A SENHA FOI DIGITADA CORRETAMENTE*/
            var checkBlankField = objForm.fnFormEmptyCheck(condicoesCampoObrigatorio, condicoesPulaCampo);

            /* CASO NÃO TENHA CAMPOS VAZIO, SUBMETE O FORM */
            if (checkBlankField == true)
                $("form").submit();

            return false;
        },
        fnShowImage: function(showImg, id, opt) {

            switch (opt) {
                case 'galeria':
                    if (showImg === true) {
                        $("#imgGaleria").attr("src", './img/GALERIA_NOTICIAS/' + id);
                        $("#imgGaleria").show();
                    } else {
                        $("#imgGaleria").attr("src", '');
                        $("#imgGaleria").hide();
                    }

                    break;
                case 'img':
                    if (showImg === true) {
                        $("#imgShow").attr("src", $("#hddImg" + id).val());
                        $("#dvImgShow").show();
                    } else {
                        $("#imgShow").attr("src", "");
                        $("#dvImgShow").hide();
                    }
                    break;
            }//fim switch

        }//fim fnShowImage
    };
}();


/* DOCUMENT.READY */
objNoticias.Init();