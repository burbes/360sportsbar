<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Galerias
 
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
    <a class="cp" onclick="objGalerias.fnOpenFormInsert();" >Inserir</a>

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
        $galeria = Galerias::listar(null, Array('IMAGENS' => 'ID_IMAGEM'));

        /* CASO HAJA REGISTRO */
        if ($galeria > 0 && $galeria != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($galeria as $b):

                /* VARIAVIES */
                $id_galeria = $b['ID_GALERIA'];
                $data = formataData($b['DATA']);
                $titulo = $b['TITULO'];
                $sub_titulo = $b['SUB_TITULO'];
                $id_imagem = $b['ID_IMAGEM'];
                $img = $b['IMG'];
                $fotografo = $b['FOTOGRAFO'];
                $ativo = $b['ATIVO'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_galeria . "  </li>";
                echo "  <li><span class='name_user'>" . $titulo . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objGalerias.fnOpenFormEdit($id_galeria);' >Editar</a> "
                . "             <a class='cp' onclick='objGalerias.fnDelete($id_galeria);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddGaleria$id_galeria\" "
                . "value='{ "
                . "          \"data\": \"$data\", "
                . "          \"titulo\": \"$titulo\", "
                . "          \"sub_titulo\": \"$sub_titulo\", "
                . "          \"img\": \"$img\", "
                . "          \"id_imagem\": \"$id_imagem\", "
                . "          \"fotografo\": \"$fotografo\", "
                . "          \"ativo\": \"" . $b['ATIVO'] . "\" "
                . "     }' />"
                . "         <input type='hidden' id='hddImg$id_galeria' value='$img' /> "
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