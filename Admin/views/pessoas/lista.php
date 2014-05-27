<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Pessoas
 
 *               
 * Created on :  27/02/2014
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
    <a class="cp" onclick="objPessoas.fnOpenFormInsert();" >Inserir</a>

    <!-- NUMERAÇÃO DA PAGINAÇÃO -->
    <div class="page_navigation"></div>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='nome_pessoa' >Nome</span></li>
    <li><span class='cargo_pessoa'>Cargo</span></li>
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
    $pessoa = Pessoas::listar();

    /* CASO HAJA REGISTRO */
    if ($pessoa > 0 && $pessoa != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($pessoa as $p):

            /* VARIAVIES */
            $id_pessoa = $p['id_pessoa'];
            $area = $p['area'];
            $nome = $p['nome'];
            $cargo = $p['cargo'];
            $telefone = $p['telefone'];
            $email = $p['email'];
            $descricao = $p['descricao'];
            $img = $p['img'];
            $ativo = $p['ativo'] == 1 ? 'Sim' : 'Não';

            /* LINHA - REGISTRO */
            echo "<p><ul class='content'>  ";
            echo "  <li>$id_pessoa</li>";
            echo "  <li><span class='nome_pessoa'>$nome</span></li>";
            echo "  <li><span class='cargo_pessoa'>$cargo</span></li>";
            echo "  <li>$ativo</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objPessoas.fnOpenFormEdit($id_pessoa);' >Editar</a>"
            . "             <a class='cp' onclick='objPessoas.fnDelete($id_pessoa);' >Deletar</a> "
            . "     </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> "
            . "         <input type=\"hidden\" id=\"hddPessoa$id_pessoa\" "
            . "             value='{ "
            . "                         \"nome\": \"$nome\", "
            . "                         \"area\": \"$area\", "
            . "                         \"cargo\": \"$cargo\", "
            . "                         \"telefone\": \"$telefone\", "
            . "                         \"email\": \"$email\", "
            . "                         \"ativo\": \"{$p['ativo']}\", "
            . "                         \"img\": \"$img\" "
            . "                     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_pessoa' value='$descricao' /> "
            . "         <input type='hidden' id='hddImg$id_pessoa' value='$img' /> "
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