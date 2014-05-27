<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Associados
 
 *               
 * Created on :  09/04/2014
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
    <a class="cp" onclick="objAssociados.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='nome_empresa' >Nome Empresa</span></li>
        <li>CNPJ</li>
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
    $associados = Associados::listar();

    /* CASO HAJA REGISTRO */
    if ($associados > 0 && $associados != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($associados as $a):

            /* VARIAVIES */
            $id_associado = $a['id_associado'];
            $nome_empresa = $a['nome_empresa'];
            $breve_descr = $a['descricao'];
            $img = $a['img'];
            $cnpj = $a['cnpj'];
            $aux_cnpj = $a['cnpj'] != "" ? $a['cnpj'] : "S/N";
            $nome_responsavel = $a['nome_responsavel'];
            $email = $a['email'];
            $id_segmento = $a['id_segmento'];
            $id_endereco = $a['id_endereco'];
            //var_dump($a['cnpj']);
            /* LINHA - REGISTRO */
            echo "<p><ul class='content'>  ";
            echo "  <li>$id_associado</li>";
            echo "  <li><span class='nome_empresa'>$nome_empresa</span></li>";
            echo "  <li>$aux_cnpj</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objAssociados.fnOpenFormEdit($id_associado);' >Editar</a> "
            . "             <a class='cp' onclick='objAssociados.fnDelete($id_associado);' >Deletar</a> </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> <input type=\"hidden\" id=\"hddAssociado$id_associado\" "
            . "value='{ "
            . "          \"nome_empresa\": \"$nome_empresa\", "
            . "          \"img\": \"$img\", "
            . "          \"cnpj\": \"$cnpj\", "
            . "          \"nome_responsavel\": \"$nome_responsavel\", "
            . "          \"email\": \"$email\", "
            . "          \"id_segmento\": \"$id_segmento\", "
            . "          \"id_endereco\": \"$id_endereco\" "
            . "     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescr$id_associado' value='$breve_descr' /> "
            . "         <input type='hidden' id='hddImg$id_associado' value='$img' /> "
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