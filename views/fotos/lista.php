<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Fotos
 
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
-->


<div id="paging_container" class="container">

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objFotos.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class="content w100p">
        <li>ID</li>
        <li><span class="name_user">Titulo</span></li>
        <li>ID TELA</li>
    </ul>

    <hr/>

    <!-- the input fields that will hold the variables we will use -->  
    <input type='hidden' id='current_page' />  
    <input type='hidden' id='show_per_page' /> 

    <!-- Content div. The child elements will be used for paginating(they don't have to be all the same,  
        you can use divs, paragraphs, spans, or whatever you like mixed together). '-->  
    <div id='content'>  


        <?php
        /* INSTANCIA O OBJETO USUÁRIOS - LISTAGEM */
        $imagem = Fotos::listar(null, null);

        /* CASO HAJA REGISTRO */
        if ($imagem > 0 && $imagem != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($imagem as $b):

                /* VARIAVIES */
                $id_imagem = $b['ID_FOTO'];
                $id_galeria = $b['ID_GALERIA'];
                $img = $b['IMG'];

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_imagem . "  </li>";
                echo "  <li><span class='name_user'>" . $img . "</span></li>";
                echo "  <li>" . $id_galeria . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objFotos.fnOpenFormEdit($id_imagem);' >Editar</a> "
                . "             <a class='cp' onclick='objFotos.fnDelete($id_imagem);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddImagem$id_imagem\" "
                . "value='{ "
                . "          \"img\": \"" . $img . "\", "
                . "          \"id_imagem\": \"$id_imagem\", "
                . "          \"id_galeria\": \"" . $b['ID_GALERIA'] . "\" "
                . "     }' />"
                . "         <input type='hidden' id='hddImg$id_imagem' value='$img' /> "
                . "</li>";
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