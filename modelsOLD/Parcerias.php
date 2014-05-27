<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Eventos
 *               
 * Created on :  24/04/2014
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

class Parcerias extends Functions {

    private static $_tbName = 'PARCERIAS';
    private static $_pkName = 'ID_PARCERIA';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar() {
        return Functions::all(self::$_tbName, null);
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
