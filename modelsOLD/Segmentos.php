<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Segmentos
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

class Segmentos extends Functions {

    private static $_tbName = 'SEGMENTOS';
    private static $_pkName = 'ID_SEGMENTO';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar($columns = null) {
        return Functions::all(self::$_tbName, $columns);
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

    public static function carregaArquivo($condicoes) {
        return Functions::uploadFile(self::$_tbName, $condicoes);
    }

}
