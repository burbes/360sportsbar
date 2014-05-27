<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Tipos
 
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
    <a class="cp" onclick="objTipos.fnOpenFormInsert();" >Inserir</a>

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
        $tipos = Tipos::listar(null, null);
        
        /* CASO HAJA REGISTRO */
        if ($tipos > 0 && $tipos != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($tipos as $b):

                /* VARIAVIES */
                $id_tipo = $b['ID_TIPO'];

                $nome = $b['NOME'];
                $id_tela = $b['ID_TELA'];

                $ativo = $b['ATIVO'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_tipo . "  </li>";
                echo "  <li><span class='name_user'>" . $nome . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objTipos.fnOpenFormEdit($id_tipo);' >Editar</a> "
                . "             <a class='cp' onclick='objTipos.fnDelete($id_tipo);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddTipo$id_tipo\" "
                . "value='{ "
                . "          \"nome\": \"$nome\", "
                . "          \"id_tela\": \"$id_tela\", "
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