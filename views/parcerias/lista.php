<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Parcerias
 
 *               
 * Created on :  24/04/2014
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
    <a class="cp" onclick="objParcerias.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content' >
        <li>ID</li>
        <li><span class='nome_parceria'>Nome</span></li>
        <li>Tipo</li>
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
        $parceria = Parcerias::listar();

        /* CASO HAJA REGISTRO */
        if ($parceria > 0 && $parceria != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($parceria as $e):

                /* VARIAVIES */
                $id_parceria = $e['id_parceria'];
                $nome = $e['nome'];
                $tipo = $e['tipo'];
                $descricao = $e['descricao'];
                $breve_descr = $e['breve_descr'];
                $link = $e['link'];
                $img = $e['img'];
                $titulo = $nome != '' ? $nome : '<a href="' . $link . '">' . $link . '</a>';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_parceria . "  </li>";
                echo "  <li><span class='nome_parceria'>" . $titulo . "</span></li>";
                echo "  <li>$tipo</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objParcerias.fnOpenFormEdit($id_parceria);' >Editar</a> "
                . "             <a class='cp' onclick='objParcerias.fnDelete($id_parceria);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddParceria$id_parceria\" "
                . "value='{ "
                . "          \"nome\": \"$nome\", "
                . "          \"tipo\": \"$tipo\", "
                . "          \"link\": \"$link\", "
                . "          \"img\": \"$img\" "
                . "     }' />"
                . "         <input type='hidden' id='hddTxtAreaDescricao$id_parceria' value='$descricao' /> "
                . "         <input type='hidden' id='hddTxtAreaBreveDescr$id_parceria' value='$breve_descr' /> "
                . "         <input type='hidden' id='hddImg$id_parceria' value='$img' /> "
                . " </li>";
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