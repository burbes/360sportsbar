<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Newsletter
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

class NewsLetter extends Functions {

    private static $_tbName = 'NEWSLETTER';
    private static $_pkName = 'ID_NEWSLETTER';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar() {
        return Functions::all(self::$_tbName, null, null);
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

}
