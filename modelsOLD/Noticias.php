<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Noticias
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

class Noticias extends Functions {

    private static $_tbName = 'NOTICIAS';
    private static $_photoTbName = 'FOTOS';
    private static $_pkName = 'ID_NOTICIA';
    private static $_lastId = null;

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar() {
        return Functions::all(self::$_tbName, null, null);
    }

    public static function setId($id) {
        self::$_lastId = $id;
    }

    public static function getId() {
        return self::$_lastId;
    }

    public static function galeriaFotos($id_noticia) {

        $array = Array();

        $sql = "    SELECT  id_foto,img"
                . " FROM    fotos "
                . " WHERE   1 = 1 "
                . " AND     id_noticia = $id_noticia "
                . " ORDER BY id_foto ASC ";

        $fotos = Functions::querySQL($sql);


        foreach ($fotos as $key => $value) {
            $array['id_foto'][$key] = $value['id_foto'];
            $array['img'][$key] = $value['img'];
        }

        return $array;
    }

    public static function qtdeFotos($id_noticia) {
        return Functions::count(self::$_photoTbName, Array(self::$_pkName => $id_noticia));
    }

    public static function segmentos() {

        $array = Array();

        $sql = "    SELECT  id_segmento,titulo "
                . " FROM    segmentos "
                . " WHERE   1 = 1 "
                . " ORDER BY titulo ASC ";

        $segmentos = Functions::querySQL($sql);

        foreach ($segmentos as $key => $value) {
            $array['id_segmento'][$key] = $value['id_segmento'];
            $array['titulo'][$key] = $value['titulo'];
        }

        return $array;
    }

    public static function inserir($dados) {
        $lastId = Functions::Insert(self::$_tbName, $dados);
        self::setId($lastId);
        return $lastId;
    }

    public static function atualizar($dados, $condicoes) {
        $lastId = Functions::Update(self::$_tbName, $dados, $condicoes);
        self::setId($lastId);
        return $lastId;
    }

    public static function remover($condicoes) {

        $photoCheck = Functions::count(self::$_photoTbName, $condicoes);

        /* REMOVE A GALERIA DA NOTICIA */
        if ($photoCheck > 0)
            return Functions::Delete(self::$_photoTbName, $condicoes);

        /* REMOVE A NOTICIA */
        return Functions::Delete(self::$_tbName, $condicoes);
    }

    public static function excluirFoto($condicoes) {
        /* REMOVE A FOTO DA GALERIA DA NOTICIA */
        return Functions::Delete(self::$_photoTbName, $condicoes);
    }

    public static function salvaGaleria($arquivos) {
        /* VARIAVEIS */
        $id_noticia = self::getId();
        $dataAtual = date('Y-m-d');
        $usuario = $_SESSION['id'];

        /* INSERE CADA ARQUIVOS NO BD */
        for ($i = 0; $i < count($arquivos['name']); $i++) {

            /* CONSULTA SQL */
            $sql = "    INSERT INTO fotos (img, id_noticia,data_modificacao,id_usuario) "
                    . " VALUES ( '{$arquivos['name'][$i]}', $id_noticia, '$dataAtual', $usuario ); ";

            /* INSERE O ARQUIVO NO BD */
            Functions::querySQL($sql);
        }
    }

    public static function carregaArquivo($condicoes) {

        Functions::errorMsg($_FILES['ARQUIVOS']['error']);

        return Functions::uploadFile(self::$_tbName, $condicoes);
    }

//    public static function carregaGaleria() {
//
//        $strDirName = 'GALERIA_NOTICIAS';
//
//        /* CONDIÇÕES 
//         * [dirType]: MOVER PARA PASTA DE IMAGENS */
//        $condicoes = Array("dirType" => '..' . DIRECTORY_SEPARATOR . 'img');
//
//        /* GAMBIARRA P/ PODER FAZER FUNCIONAR NA FUNÇÃO 'UPLOADFILE' */
//        $_FILES['file'] = $_FILES['Filedata'];
//
//        unset($_FILES['Filedata']);
//
//        /* PARA CADA ARQUIVO */
//        $uploadFile = Functions::uploadFile($strDirName, $condicoes);
//    }
}

//tá dando pau... pois as models são todas carregadas no inicio..
/*if ($_POST && !empty($_FILES)) {
    $noticias = new Noticias();
    $noticias->carregaGaleria();
}*/
