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
    <a class="cp" onclick="objUsuarios.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class="content w100p">
        <li>ID</li>
        <li><span class="name_user">Nome</span></li>
        <li><span class="email_user">Email</span></li>
        <li><span class="type_user">Tipo</span></li>
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
        $usuario = Usuarios::listar();

        /* CASO HAJA REGISTRO */
        if ($usuario > 0 && $usuario != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($usuario as $u):

                /* VARIAVIES */
                $id_usuario = $u['ID_USUARIO'];
                $nome = $u['NOME'];
                $email = $u['EMAIL'];
                $apelido = $u['APELIDO'];
                $rg = $u['RG'];
                $cpf = $u['CPF'];
                $data_nascimento = $u['DATA_NASCIMENTO'];
                $telefone_celular = $u['TELEFONE_CELULAR'];
                $telefone_fixo = $u['TELEFONE_FIXO'];
                $telefone_comercial = $u['TELEFONE_COMERCIAL'];
                $sexo = $u['SEXO'];
                $newsletter = $u['NEWSLETTER'];
                $endereco_cobranca = $u['ENDERECO_COBRANCA'];
                $numero_cobranca = $u['NUMERO_COBRANCA'];
                $complemento_cobranca = $u['COMPLEMENTO_COBRANCA'];
                $cep_cobranca = $u['CEP_COBRANCA'];
                $cidade_cobranca = $u['CIDADE_COBRANCA'];
                $uf_cobranca = $u['UF_COBRANCA'];
                $endereco_entrega = $u['ENDERECO_ENTREGA'];
                $numero_entrega = $u['NUMERO_ENTREGA'];
                $complemento_entrega = $u['COMPLEMENTO_ENTREGA'];
                $cep_entrega = $u['CEP_ENTREGA'];
                $cidade_entrega = $u['CIDADE_ENTREGA'];
                $uf_entrega = $u['UF_ENTREGA'];
                $ativo = $u['ATIVO'];
                $id_tipo_usuario = $u['ID_TIPO_USUARIO'];

                switch ($u['ID_TIPO_USUARIO']) {
                    case 1:
                        $tipo = 'ADMINISTRADOR';
                        break;
                    case 2:
                        $tipo = 'OPERADOR';
                        break;
                    case 3:
                        $tipo = 'USUÁRIO';
                        break;

                    default:
                        break;
                }

                $ativo = $u['ATIVO'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>$id_usuario</li>";
                echo "  <li><span class='name_user'>$nome</span></li>";
                echo "  <li><span class='email_user'>$email</span></li>";
                echo "  <li><span class='type_user'>$tipo</span></li>";
                echo "  <li>$ativo</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objUsuarios.fnOpenFormEdit($id_usuario);' >Editar</a> "
                . "             <a class='cp' onclick='objUsuarios.fnDelete($id_usuario);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddUsuario$id_usuario\" "
                . "value='{ "
                . "  \"ID_USUARIO\": \"$id_usuario\","
                . "  \"NOME\": \"$nome\","
                . "  \"EMAIL\": \"$email\","
                . "  \"APELIDO\": \"$apelido\","
                . "  \"RG\": \"$rg\","
                . "  \"CPF\": \"$cpf\","
                . "  \"DATA_NASCIMENTO\": \"" . formataData($data_nascimento) . "\","
                . "  \"TELEFONE_CELULAR\": \"$telefone_celular\","
                . "  \"TELEFONE_FIXO\": \"$telefone_fixo\","
                . "  \"TELEFONE_COMERCIAL\": \"$telefone_comercial\","
                . "  \"SEXO\": \"$sexo\","
                . "  \"NEWSLETTER\": \"$newsletter\","
                . "  \"ENDERECO_COBRANCA\": \"$endereco_cobranca\","
                . "  \"NUMERO_COBRANCA\": \"$numero_cobranca\","
                . "  \"COMPLEMENTO_COBRANCA\": \"$complemento_cobranca\","
                . "  \"CEP_COBRANCA\": \"$cep_cobranca\","
                . "  \"CIDADE_COBRANCA\": \"$cidade_cobranca\","
                . "  \"UF_COBRANCA\": \"$uf_cobranca\","
                . "  \"ENDERECO_ENTREGA\": \"$endereco_entrega\","
                . "  \"NUMERO_ENTREGA\": \"$numero_entrega\","
                . "  \"COMPLEMENTO_ENTREGA\": \"$complemento_entrega\","
                . "  \"CEP_ENTREGA\": \"$cep_entrega\","
                . "  \"CIDADE_ENTREGA\": \"$cidade_entrega\","
                . "  \"UF_ENTREGA\": \"$uf_entrega\","
                . "  \"ATIVO\": \"" . $u['ATIVO'] . "\","
                . "  \"ID_TIPO_USUARIO\": \"$id_tipo_usuario\""
                . "     }' </li>";
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