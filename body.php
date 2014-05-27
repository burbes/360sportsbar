<?php
/*
 * ***********************************************
 * Objetivo:     Corpo da pagina onde é carregado 
 *               o conteúdo
 *               
 * Created on :  20/02/2014
 * Author     :  Naelson Matheus Jr
 * 
 * ***********************************************
 * Updates
 * 
 * Created on :  19/03/2014
 * Author     :  Naelson M. Jr
 * Description:  Adicionado Menu Banners 
 */

/* Variaveis */
$file = null;
$title = null;
$menu = isset($_GET['menu']) ? $_GET['menu'] : null;

/* MENU  */
switch ($menu) {
    case 'usuarios':
        $file = 'views/usuarios/index.php';
        $title = 'Usuários';
        break;
    case 'bebidas':
        $file = 'views/bebidas/index.php';
        $title = 'Bebidas';
        break;
    case 'comidas':
        $file = 'views/comidas/index.php';
        $title = 'Comidas';
        break;
    case 'cardapios':
        $file = 'views/cardapios/index.php';
        $title = 'Cardapios';
        break;
    case 'telas':
        $file = 'views/telas/index.php';
        $title = 'Telas';
        break;
    case 'imagens':
        $file = 'views/imagens/index.php';
        $title = 'Imagens';
        break;
    case 'tipos':
        $file = 'views/tipos/index.php';
        $title = 'Tipos';
        break;
    case 'status':
        $file = 'views/status/index.php';
        $title = 'Status';
        break;
    case 'galerias':
        $file = 'views/galerias/index.php';
        $title = 'Galerias';
        break;
    case 'fotos':
        $file = 'views/fotos/index.php';
        $title = 'Fotos';
        break;
    default:
        $file = 'views/home/index.php';
        $title = 'Pagina Inicial';
        break;
}
?>

<!-- TITULO DA PAGINA -->
<div class='tac'>
    <h1><?php echo $title; ?></h1>
</div>

<br/>

<!-- INCLUI O CONTEÚDO DO MENU SELECIONADO -->
<?php isset($file) ? include "$file" : null; ?>

