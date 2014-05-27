<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Titulos das Redes Sociais
 
 *               
 * Created on :  03/04/2014
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
    <a class="cp" onclick="objRedeSocial.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user'>Nome</span></li>
        <li>Link</li>
        <li>Img</li>
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
        $redessociais = RedesSociais::listar();

        /* CASO HAJA REGISTRO */
        if ($redessociais > 0 && $redessociais != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($redessociais as $h):

                /* VARIAVIES */
                $id_redesocial = $h['id_redesocial'];
                $nome = $h['nome'];
                $link = isset($h['link']) ? 'Sim' : 'Não';
                $breve_descr = $h['breve_descr'];
                $img = isset($h['img']) ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>$id_redesocial</li>";
                echo "  <li><span class='name_user'>$nome</span></li>";
                echo "  <li>$link</li>";
                echo "  <li>$img</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objRedeSocial.fnOpenFormEdit($id_redesocial);' >Editar</a> "
                . "             <a class='cp' onclick='objRedeSocial.fnDelete($id_redesocial);' >Deletar</a> "
                . "     </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> "
                . "         <input type=\"hidden\" id=\"hddRedeSocial$id_redesocial\" "
                . "             value='{ \"nome\": \"$nome\", \"img\": \"{$h['img']}\", \"ativo\": \"{$h['ativo']}\", \"link\": \"{$h['link']}\" }' />"
                . "         <input type='hidden' id='hddTxtAreaDescricao$id_redesocial' value='$breve_descr' />"
                . "         <input type='hidden' id='hddImg$id_redesocial' value='{$h['img']}' /> "
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