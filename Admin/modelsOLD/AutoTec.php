<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Automação e Tecnologia
 *               
 * Created on :  14/04/2014
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

class AutoTec extends Functions {

    private static $_tbName = 'AUTOMACAO_TECNOLOGIA';
    private static $_auxTbName = 'segmentos';
    private static $_pkName = 'ID_AUTOTEC';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar() {
        return Functions::all(self::$_tbName, null);
    }

    public static function selectOptionSegmentos($opt = true) {
        $sql = "    SELECT ID_SEGMENTO,TITULO "
                . " FROM " . self::$_auxTbName
                . " ORDER BY TITULO ASC ";
        $exec = Functions::querySQL($sql);

        $options = "";

        if ($opt == true)
            foreach ($exec as $key => $value)
                $options .= "<option value='{$value['ID_SEGMENTO']}'>{$value['TITULO']}</option>";
        else {
            $options = Array();
            foreach ($exec as $key => $value)
                $options[$value['ID_SEGMENTO']] = $value['TITULO'];
        }

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
