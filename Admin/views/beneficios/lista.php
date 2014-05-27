<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Beneficios
 
 *               
 * Created on :  04/04/2014
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
    <style>
    </style>

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objBeneficios.fnOpenFormInsert();" >Inserir</a>

    <!-- NUMERAÇÃO DA PAGINAÇÃO -->
    <div class="page_navigation"></div>

    <br/>

    <ul class="content w100p">
        <li>ID</li>
        <li><span class="titulo_beneficio">Titulo</span></li>
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
        $beneficios = Beneficios::listar();

        /* CASO HAJA REGISTRO */
        if ($beneficios > 0 && $beneficios != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($beneficios as $b):

                /* VARIAVIES */
                $id_beneficio = $b['id_beneficio'];
                $titulo = $b['titulo'];
                $descricao = $b['descricao'];
                $img = $b['img'];
                $ativo = $b['ativo'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<ul class='content'>  ";
                echo "  <li>" . $id_beneficio . "  </li>";
                echo "  <li><span class='titulo_beneficio'>" . $titulo . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objBeneficios.fnOpenFormEdit($id_beneficio);' >Editar</a> "
                . "             <a class='cp' onclick='objBeneficios.fnDelete($id_beneficio);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddBeneficio$id_beneficio\" "
                . "value='{ "
                . "          \"titulo\": \"$titulo\", "
                . "          \"img\": \"$img\", "
                . "          \"ativo\": \"" . $b['ativo'] . "\" "
                . "     }' />"
                . "         <input type='hidden' id='hddTxtAreaDescricao$id_beneficio' value='$descricao' /> "
                . "         <input type='hidden' id='hddImg$id_beneficio' value='$img' /> "
                . " </li>";
                echo "</ul>";

                echo "<br/>";

            endforeach;
        else
            echo "<p>Lista Vazia!</p>";
        ?>

    </div>

    <!-- An empty div which will be populated using jQuery -->  
    <div id='page_navigation'></div>  

</div>