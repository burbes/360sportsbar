<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Titulos das NewsLetter
 
 *               
 * Created on :  07/04/2014
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
    <a class="cp" onclick="objNewsLetter.fnOpenFormInsert();" >Inserir</a>
    <a class="cp" onclick="objNewsLetter.fnExport();" ><span style='color: red'>Exportar p/ Excel</span></a>

    <!-- NUMERAÇÃO DA PAGINAÇÃO -->
    <div class="page_navigation"></div>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user'>Email</span></li>
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
        $newsletter = NewsLetter::listar();

        /* CASO HAJA REGISTRO */
        if ($newsletter > 0 && $newsletter != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($newsletter as $n):

                /* VARIAVIES */
                $id_newsletter = $n['id_newsletter'];
                $email = $n['email'];
                $ativo = $n['ativo'];

                /* LINHA - REGISTRO */
                echo "<ul class='content'>  ";
                echo "  <li>$id_newsletter</li>";
                echo "  <li><span class='name_user'>$email</span></li>";
                echo "  <li>$ativo</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objNewsLetter.fnOpenFormEdit($id_newsletter);' >Editar</a> "
                . "             <a class='cp' onclick='objNewsLetter.fnDelete($id_newsletter);' >Deletar</a> "
                . "     </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> "
                . "         <input type=\"hidden\" id=\"hddNewsLetter$id_newsletter\" "
                . "             value='{ \"email\": \"$email\", \"ativo\": \"{$n['ativo']}\" }' />"
                . "     </li> ";
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