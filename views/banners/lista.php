<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Usuários
 
 *               
 * Created on :  21/02/2014
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
    <a class="cp" onclick="objBanners.fnOpenFormInsert();" >Inserir</a>
    
    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='titulo_banner' >Titulo</span></li>
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
    $banner = Banners::listar();

    /* CASO HAJA REGISTRO */
    if ($banner > 0 && $banner != false)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($banner as $b):

            /* VARIAVIES */
            $id_banner = $b['id_banner'];
            $titulo = $b['titulo'];
            $descricao = $b['descricao'];
            $img = $b['img'];
            $link = $b['link'];

            $ativo = $b['ativo'] == 1 ? 'Sim' : 'Não';

            /* LINHA - REGISTRO */
            echo "<p><ul class='content'>  ";
            echo "  <li>" . $id_banner . "  </li>";
            echo "  <li><span class='titulo_banner'>" . $titulo . "</span></li>";
            
            echo "  <li>" . $ativo . "</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objBanners.fnOpenFormEdit($id_banner);' >Editar</a> "
            . "             <a class='cp' onclick='objBanners.fnDelete($id_banner);' >Deletar</a> </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> <input type=\"hidden\" id=\"hddBanner$id_banner\" "
            . "value='{ "
            . "          \"titulo\": \"$titulo\", "            
            . "          \"img\": \"$img\", "
            . "          \"link\": \"$link\", "
            . "          \"ativo\": \"" . $b['ativo'] . "\" "
            . "     }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_banner' value='$descricao' /> "
            . "         <input type='hidden' id='hddImg$id_banner' value='$img' /> "
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