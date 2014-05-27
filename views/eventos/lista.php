<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Eventos
 
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
    <a class="cp" onclick="objEventos.fnOpenFormInsert();" >Inserir</a>

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
        $evento = Eventos::listar();

        /* CASO HAJA REGISTRO */
        if ($evento > 0 && $evento != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($evento as $e):

                /* VARIAVIES */
                $id_evento = $e['id_evento'];
                $titulo = $e['titulo'];
                $contato = $e['contato'];
                $datahora = $e['datahora'];
//                $tipo = $e['tipo'];
                $local = $e['local'];
                $descricao = $e['descricao'];
                $breve_descr = $e['breve_descr'];
                $img = $e['img'];

                $ativo = $e['ativo'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_evento . "  </li>";
                echo "  <li><span class='name_user'>" . $titulo . "</span></li>";

                echo '<li>' . $ativo . '</li>';

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objEventos.fnOpenFormEdit($id_evento);' >Editar</a> "
                . "             <a class='cp' onclick='objEventos.fnDelete($id_evento);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddEvento$id_evento\" "
                . "value='{ "
                . "          \"titulo\": \"$titulo\", "
                . "          \"contato\": \"$contato\", "
                . "          \"datahora\": \"" . formataData($datahora) . "\", "
//                . "          \"tipo\": \"$tipo\", "
                . "          \"local\": \"$local\", "
                . "          \"img\": \"$img\", "
                . "          \"ativo\": \"{$e['ativo']}\" "
                . "     }' />"
                . "         <input type='hidden' id='hddTxtAreaDescricao$id_evento' value='$descricao' /> "
                . "         <input type='hidden' id='hddTxtAreaBreveDescr$id_evento' value='$breve_descr' /> "
                . "         <input type='hidden' id='hddImg$id_evento' value='$img' /> "
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