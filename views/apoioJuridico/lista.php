<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Apoio_Juridico
 
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

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objApoio_Juridico.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user'>Titulo</span></li>
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
    $apoio_juridico = Apoio_Juridico::listar();

    /* CASO HAJA REGISTRO */
    if ($apoio_juridico > 0 && $apoio_juridico != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($apoio_juridico as $aj):

            /* VARIAVIES */
            $id_apoiojuridico = $aj['id_apoiojuridico'];
            $titulo = $aj['titulo'];
            $descricao = $aj['descricao'];
            $img = $aj['img'];
            $latitude = $aj['latitude'];
            $longitude = $aj['longitude'];
            $ativo = $aj['ativo'] == 1 ? 'Sim' : 'Não';

            /* LINHA - REGISTRO */
            echo "<ul class='content'>";
            echo "  <li>$id_apoiojuridico</li>";
            echo "  <li><span class='name_user'>$titulo</span></li>";
            echo "  <li>$ativo</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objApoio_Juridico.fnOpenFormEdit($id_apoiojuridico);' >Editar</a> "
            . "             <a class='cp' onclick='objApoio_Juridico.fnDelete($id_apoiojuridico);' >Deletar</a> </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> <input type=\"hidden\" id=\"hddApoio_Juridico$id_apoiojuridico\" "
            . "value='{ "
            . "          \"titulo\": \"$titulo\","
            . "          \"img\": \"$img\","
            . "          \"longitude\": \"$longitude\","
            . "          \"latitude\": \"$latitude\","
            . "          \"ativo\": \"{$aj['ativo']}\""
            . "     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_apoiojuridico' value='$descricao' /> "
            . "         <input type='hidden' id='hddImg$id_apoiojuridico' value='$img' /> "
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