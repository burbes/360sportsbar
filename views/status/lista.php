<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Status
 
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
    <a class="cp" onclick="objStatus.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class="content w100p">
        <li>ID</li>
        <li><span class="name_user">Titulo</span></li>
        <li>Ativo</li>
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
        $status = Status::listar(null, null);

        /* CASO HAJA REGISTRO */
        if ($status > 0 && $status != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($status as $b):

                /* VARIAVIES */
                $id_status = $b['ID_STATUS'];

                $nome = $b['NOME'];

                $ativo = $b['ATIVO'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_status . "  </li>";
                echo "  <li><span class='name_user'>" . $nome . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objStatus.fnOpenFormEdit($id_status);' >Editar</a> "
                . "             <a class='cp' onclick='objStatus.fnDelete($id_status);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddStatus$id_status\" "
                . "value='{ "
                . "          \"nome\": \"$nome\", "
                . "          \"ativo\": \"" . $b['ATIVO'] . "\" "
                . "     }' />"
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