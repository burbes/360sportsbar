<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Bebidas
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

class Bebidas extends Functions {

    private static $_tbName = 'BEBIDAS';
    private static $_pkName = 'ID_BEBIDA';
    private static $_TipostbName = 'TIPOS';
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

    public static function selectOptionTipos() {
        $sql = "    SELECT  ID_TIPO,NOME "
                . " FROM    " . self::$_TipostbName . " "
                . " WHERE   1 = 1 "
                . " AND     ATIVO = 1 "
                . " AND     ID_TELA = 1 "
                . " ORDER BY NOME ASC ";

        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_TIPO']}'>{$value['NOME']}</option>";

        return $options;
    }

}
