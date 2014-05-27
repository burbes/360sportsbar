<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Comidas
 
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
    <a class="cp" onclick="objComidas.fnOpenFormInsert();" >Inserir</a>

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
        $comida = Comidas::listar(null, Array('IMAGENS' => 'ID_IMAGEM'));

        /* CASO HAJA REGISTRO */
        if ($comida > 0 && $comida != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($comida as $b):

                /* VARIAVIES */
                $id_comida = $b['ID_COMIDA'];
                $id_imagem = $b['ID_IMAGEM'];
                $nome = $b['NOME'];
                $preco = $b['PRECO'];
                $id_tipo = $b['ID_TIPO'];
                $img = $b['IMG'];
                $ativo = $b['ATIVO'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_comida . "  </li>";
                echo "  <li><span class='name_user'>" . $nome . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objComidas.fnOpenFormEdit($id_comida);' >Editar</a> "
                . "             <a class='cp' onclick='objComidas.fnDelete($id_comida);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddComida$id_comida\" "
                . "value='{ "
                . "          \"nome\": \"$nome\", "
                . "          \"preco\": \"$preco\", "
                . "          \"id_tipo\": \"$id_tipo\", "
                . "          \"img\": \"$img\", "
                . "          \"id_imagem\": \"$id_imagem\", "
                . "          \"ativo\": \"" . $b['ATIVO'] . "\" "
                . "     }' />"
                . "         <input type='hidden' id='hddImg$id_comida' value='$img' /> "
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