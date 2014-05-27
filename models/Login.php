<?php

/*
 * ***********************************************
 * Objetivo:     Classe com methodos para retornar
 *               os dados dos usuários
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

class Login extends Conexao {

    public static function auth($email, $senha) {

        //$con = self::conectar();
        $con = new Conexao();


        $sql = "    SELECT  * "
                . " FROM    USUARIOS " //. $this->_tbName
                . " WHERE   1 = 1 "
                . " AND     EMAIL = '$email'"
                . " AND     SENHA = md5('" . $senha . "')";
                //. " AND     SENHA = '$senha'";

        $exec = $con->query($sql)->fetchAll(/* PDO::FETCH_ASSOC */);
        
        return count($exec) > 0 ? $exec : false;
    }

}
