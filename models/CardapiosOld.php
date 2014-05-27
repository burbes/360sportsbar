<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Cardapios
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

class CardapiosOld extends Functions {

    private static $_tbName = 'CARDAPIOS';
    private static $_pkName = 'ID_CARDAPIO';
    private static $_TipostbName = 'TIPOS';
    private static $_ComidastbName = 'COMIDAS';
    private static $_BebidastbName = 'BEBIDAS';

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

    public static function selectOptionTipos() {
        $sql = "    SELECT  ID_TIPO,NOME "
                . " FROM    " . self::$_TipostbName . " "
                . " WHERE   1 = 1 "
                . " AND     ATIVO = 1 "
                . " ORDER BY NOME ASC ";

        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_TIPO']}'>{$value['NOME']}</option>";

        return $options;
    }

    public static function selectOptionBebidas() {
        $sql = "    SELECT  ID_BEBIDA,NOME "
                . " FROM    " . self::$_BebidastbName . " "
                . " WHERE   1 = 1 "
                . " AND     ATIVO = 1 "
                . " ORDER BY NOME ASC ";

        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_BEBIDA']}'>{$value['NOME']}</option>";

        return $options;
    }

    public static function selectOptionComidas() {
        $sql = "    SELECT  ID_COMIDA,NOME "
                . " FROM    " . self::$_ComidastbName . " "
                . " WHERE   1 = 1 "
                . " AND     ATIVO = 1 "
                . " ORDER BY NOME ASC ";

        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_COMIDA']}'>{$value['NOME']}</option>";

        return $options;
    }

}
