<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Automação e Tec.
 
 *               
 * Created on :  14/04/2014
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
-->


<div id="paging_container" class="container">

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objAutoTec.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user' >Nome</span></li>
        <li>Cargo</li>
        <li>Ativo</li>
    </ul>

    <!-- LINHA HORIZONTAL -->
    <hr/>

    <!-- the input fields that will hold the variables we will use -->  
    <input type='hidden' id='current_page' />  
    <input type='hidden' id='show_per_page' /> 

    <!-- Content div. The child elements will be used for paginating(they don't have to be all the same,  
        you can use divs, paragraphs, spans, or whatever you like mixed together). '-->  
    <div id='content'>  
    
    <?php
    /* INSTANCIA O OBJETO USUÁRIOS - LISTAGEM */
    $autotec = AutoTec::listar();
    $segmentos = AutoTec::selectOptionSegmentos(false);
    $keys_segmentos = array_keys($segmentos);
    
    
    /* CASO HAJA REGISTRO */
    if ($autotec > 0 && $autotec != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($autotec as $a):

            /* VARIAVIES */
            $id_autotec = $a['id_autotec'];
            $id_segmento = $a['id_segmento'];
            $cor = $a['cor'];
            $link = $a['link'];
            $breve_descr = $a['breve_descr'];
            $img = $a['img'];
            $ativo = $a['ativo'] == 1 ? 'Sim' : 'Não';
            $segmento = in_array($id_segmento, $keys_segmentos) == true ? $segmentos[$id_segmento] : 'Segmento Não Encontrado';

            /* LINHA - REGISTRO */
            echo "<p><ul class='content'>  ";
            echo "  <li>$id_autotec</li>";
            echo "  <li><span class='name_user'>$segmento</span></li>";
            echo "  <li>$ativo</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objAutoTec.fnOpenFormEdit($id_autotec);' >Editar</a> "
            . "             <a class='cp' onclick='objAutoTec.fnDelete($id_autotec);' >Deletar</a> "
            . "     </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> "
            . "         <input type=\"hidden\" id=\"hddPessoa$id_autotec\" "
            . "             value='{ "
            . "                         \"segmento\": \"$segmento\", "
            . "                         \"id_segmento\": \"$id_segmento\", "
            . "                         \"cor\": \"$cor\", "
            . "                         \"link\": \"$link\", "
            . "                         \"ativo\": \"{$a['ativo']}\", "
            . "                         \"img\": \"$img\" "
            . "                     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_autotec' value='$breve_descr' /> "
            . "         <input type='hidden' id='hddImg$id_autotec' value='$img' /> "
            . "     </li> ";
            echo "</ul></p>";

            echo "<br/>";

        endforeach;
    else
        echo "<p>Lista Vazia!</p>";
    ?>

    </div>

    <!-- An empty div which will be populated using jQuery -->  
    <div id='page_navigation'></div> 
    
</div>	