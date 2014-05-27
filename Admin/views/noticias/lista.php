<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Noticias
 
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

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objNoticias.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class='content'>
        <li>ID</li>
        <li><span class='name_user'>Titulo</span></li>
        <li>Link</li>
        <li>Autor</li>
        <li>Data Notícia</li>
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

    $noticias = Noticias::listar();

    /* CASO TENHA REGISTRO */
    if ($noticias > 0)
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
        foreach ($noticias as $noticia):

            /* VARIAVIES */
            $id_noticia = $noticia['id_noticia'];
            $titulo = $noticia['titulo'];
            $autor = $noticia['autor'];
            $datahora = formataData($noticia['datahora']);
            $segmento = $noticia['id_segmento'];
            $descricao = $noticia['descricao'];
            $link = isset($noticia['link']) == 1 ? 'Sim' : 'Não';
            $img = isset($noticia['img']) == 1 ? 'Sim' : 'Não';
            $galeria = isset($noticia['galeria']) == 1 ? 'Sim' : 'Não';
            $ativo = isset($noticia['ativo']) == 1 ? 'Sim' : 'Não';

            /* GALERIA DE FOTOS */
            if ($noticia['galeria'] == 1) {

                $count = 0;
                $arrFotos = array();
                $arrIdFotos = array();

                $fotos = Noticias::galeriaFotos($id_noticia);

                for ($i = 0; $i < count($fotos['id_foto']); $i++) {
                    $count++;
                    array_push($arrFotos, $fotos['img'][$i]);
                    array_push($arrIdFotos, $fotos['id_foto'][$i]);
                }
                $auxFotos = " \"fotos\":  {    \"id_foto\" : " . json_encode($arrIdFotos) . ", "
                        . "                     \"img\": " . json_encode($arrFotos)
                        . "                } ,";
            }else
                $auxFotos = " \"fotos\":  {    \"id_foto\" : null, "
                        . "                     \"img\": null"
                        . "                } ,";

            /* LINHA - REGISTRO */
            echo "<p><ul class='content'>  ";
            echo "  <li>" . $id_noticia . "  </li>";
            echo "  <li><span class='name_user'>" . $titulo . "</span></li>";
            echo "  <li><a title='Ir para o Link' href='{$noticia['link']}'>" . $link . " </a> </li>";
            echo "  <li>" . $autor . "  </li>";
            echo "  <li>" . $datahora . "  </li>";
            echo "  <li>" . $ativo . "</li>";

            /* BTN EDITAR & REMOVER */
            echo "  <li>    <a class='cp' onclick='objNoticias.fnOpenFormEdit($id_noticia);' title='Editar Registro' >Editar</a> "
            . "             <a class='cp' onclick='objNoticias.fnDelete($id_noticia);' title='Remover Registro' >Deletar</a> "
            . "     </li>";

            /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
            echo "  <li> "
            . "         <input type=\"hidden\" id=\"hddNoticia$id_noticia\" "
            . "             value='{ $auxFotos \"id_noticia\": \"$id_noticia\", \"titulo\": \"$titulo\", \"autor\": \"$autor\", \"segmento\": \"$segmento\", \"link\": \"" . $noticia['link'] . "\", \"datahora\": \"$datahora\", \"img\": \"" . $noticia['img'] . "\", \"galeria\": \"" . $noticia['galeria'] . "\", \"ativo\": \"" . $noticia['ativo'] . "\" }' />"
            . "         <input type='hidden' id='hddTxtAreaDescricao$id_noticia' value='$descricao' /> "
            . "         <input type='hidden' id='hddImg$id_noticia' value='{$noticia['img']}' /> "
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