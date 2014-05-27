<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Associados
 *               
 * Created on :  09/04/2014
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

class Associados extends Functions {

    private static $_tbName = 'ASSOCIADOS';
    private static $_tbAdressName = 'ENDERECOS';
    private static $_pkName = 'ID_ASSOCIADO';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar($cols = null, $joins = null) {
        return Functions::all(self::$_tbName, $cols, $joins);
    }

    public static function listarEnderecos($sql) {
        return Functions::querySQL($sql);
    }

    public static function selectOptionSegmentos() {
        $sql = " SELECT ID_SEGMENTO,TITULO FROM segmentos ORDER BY TITULO ASC ";
        
        $exec = Functions::querySQL($sql);
        
        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_SEGMENTO']}'>{$value['TITULO']}</option>";

        return $options;
    }

    public static function selectOptionEnderecos() {
        $sql = " SELECT ID_ENDERECO,ENDERECO,CIDADE,UF FROM ENDERECOS ";
        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_ENDERECO']}'>{$value['ENDERECO']}, {$value['CIDADE']} - {$value['UF']}</option>";

        return $options;
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
