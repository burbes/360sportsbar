<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Galerias
 *               
 * Created on :  20/02/2014
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

class Galerias extends Functions {

    private static $_tbName = 'GALERIAS';
    private static $_pkName = 'ID_GALERIA';
    private static $_ImagenstbName = 'IMAGENS';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar($columns = null, $joins = null) {
        return Functions::all(self::$_tbName, $columns, $joins);
    }

    public static function inserir($dados) {
        return Functions::Insert(self::$_tbName, $dados);
    }

    public static function atualizar($dados, $condicoes) {
        return Functions::Update(self::$_tbName, $dados, $condicoes);
    }

    public static function remover($condicoes) {
        return Functions::Delete(self::$_tbName, $condicoes);
    }

    public static function removerImg($condicoes) {
        return Functions::Delete(self::$_ImagenstbName, $condicoes);
    }

    public static function carregaArquivo($condicoes) {
        return Functions::uploadFile(self::$_tbName, $condicoes);
    }

    public static function salvaImg($arrayImg) {
        return Functions::Insert(self::$_ImagenstbName, $arrayImg);
    }

    public static function atualizaImg($dados, $condicoes) {
        return Functions::Update(self::$_ImagenstbName, $dados, $condicoes);
    }

}
