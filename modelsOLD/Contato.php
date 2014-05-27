<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               de msg de envio dos contato
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

class Contato extends Functions {

    private static $_tbName = 'CONTATO';
    private static $_pkName = 'ID_CONTATO';

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


}
