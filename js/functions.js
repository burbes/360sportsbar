
var objForm = function() {
    return {
        fnSomenteNumero: function(e) {
            console.log(e);
            var tecla = (window.event) ? event.keyCode : e.which;
            if ((tecla > 47 && tecla < 58))
                return true;
            else {
                if (tecla == 8 || tecla == 0)
                    return true;
                else
                    return false;
            }
        },
        /* VARRE O FORM BUSCANDO POR CAMPOS VAZIOS/NULOS */
        fnFormEmptyCheck: function(conditionsTrue, conditionsFalse) {

            var semaforo = true;

            $("textarea, select ,:text, input:not([type=hidden],[type=password],[type=button],[type=file])").each(function(i, obj) {

                /* CONDIÇÃO PARA PULAR O LAÇO - IGNORA OS CAMPOS DEFINIDOS NO ARRAY CONDITIONSFALSE */
                if (objForm.isInArray($(obj).attr("id"), conditionsFalse) == true) {
                    console.log("Pula o Campo: " + $(obj).attr("id"))
                    return;
                } else
                /* CONDIÇÃO PARA VALIDAR OS CAMPOS OBRIGATORIOS */
                if ($(obj).val().trim() == "" &&
                        (objForm.isInArray($(obj).attr("name"), conditionsTrue) == true ||
                                objForm.isInArray($(obj).attr("id"), conditionsTrue) == true)) {
                    semaforo = false;
                    console.log("Campo Obrigatorio: " + $(obj).attr("id"))
                }

            });

            if (semaforo == false)
                alert("Campos vazios!");

            return semaforo;
        },
        isInArray: function(value, array) {
            //console.log(array.indexOf(value));
            return array.indexOf(value) > -1;
        },
        fnAJAX: function(id) {


            //envia os dados por POST
            jQuery.ajax({
                type: 'POST',
                url: 'ARQUIVO.php',
                data: {
                    "DATA1": DATA1,
                    "DATA2": DATA2,
                },
                beforeSend: function() {
                },
                dataType: 'html',
                success: function(data) {
                    //transforma a string retornada e transforma em um obj.                    
                    var e = eval("(" + data + ")");

                    var ok = e.ok

                }//fim fn success
            });//fim POST .ajax  

        }//fim fnRemover
    };
}();

/*FUNÇÃO QUE FAZ O USUÁRIO DIGITAR APENA NUM (NÃO SEI PQ NÃO FUNCIONOU OBJFORM) */
function fnSomenteNumero(e) {

    var tecla = (window.event) ? event.keyCode : e.which;

    if ((tecla > 47 && tecla < 58))
        return true;
    else {
        if (tecla == 8 || tecla == 0)
            return true;
        else
            return false;
    }
}