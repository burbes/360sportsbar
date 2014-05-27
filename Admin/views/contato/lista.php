<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Contato
 
 *               
 * Created on :  15/04/2014
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

    <!-- NUMERAÇÃO DA PAGINAÇÃO -->
    <div class="page_navigation"></div>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user' >Email</span></li>
        <li>Nome</li>
    </ul>

    <hr/>
    <?php
    /* INSTANCIA O OBJETO USUÁRIOS - LISTAGEM */
    $autotec = Contato::listar();

    /* CASO HAJA REGISTRO */
    if ($autotec > 0 && $autotec != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($autotec as $a):

            /* VARIAVIES */
            $id_contato = $a['id_contato'];
            $email = $a['email'];
            $telefone = $a['telefone'];
            $setor = $a['setor'];
            $nome = $a['nome'];
            $assunto = $a['assunto'];
            $descricao = $a['descricao'];

            /* LINHA - REGISTRO */
            echo "<ul class='content'>  ";
            echo "  <li>$id_contato</li>";
            echo "  <li><span class='name_user'>$email</span></li>";
            echo "  <li>$nome</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objContato.fnOpenFormEdit($id_contato);' >Abrir</a> "
            . "             <a class='cp' onclick='objContato.fnDelete($id_contato);' >Deletar</a> "
            . "     </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> "
            . "         <input type=\"hidden\" id=\"hddContato$id_contato\" "
            . "             value='{ "
            . "                         \"email\": \"$email\", "
            . "                         \"setor\": \"$setor\", "
            . "                         \"telefone\": \"$telefone\", "
            . "                         \"nome\": \"$nome\", "
            . "                         \"assunto\": \"$assunto\" "
            . "                     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_contato' value='$descricao' /> "
            . "     </li> ";
            echo "</ul>";

            echo "<br/>";

        endforeach;
    else
        echo "<p>Lista Vazia!</p>";
    ?>
</div>	