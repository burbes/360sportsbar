<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conexao extends PDO {

    /*//protected static $_host = "external-db.s170680.gridserver.com";
    protected static $_host = "internal-db.s170680.gridserver.com";
    protected static $_dbName = "db170680_afrac_dev";
    protected static $_user = "db170680_root";
    protected static $_pass = "agmint687";*/
    protected static $_host = "localhost";
    protected static $_dbName = "360sportsbar";
    protected static $_user = "root";
    protected static $_pass = "";

    
    public function __construct() {
        try {
            parent::__construct("mysql:"
                    . "host=" . self::$_host
                    . ";dbname=" . self::$_dbName
                    . ";charset=utf8", self::$_user, self::$_pass
            );

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // always disable emulated prepared statement when using the MySQL driver
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            // Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    /*
    protected static function conectar() {

        try {
            $pdo = new PDO(
                    "mysql:"
                    . "host=" . self::$_host
                    . ";dbname=" . self::$_dbName
                    . ";charset=utf8", self::$_user, self::$_pass, array(
                PDO::ATTR_PERSISTENT => true
            ));

            if (!$pdo) {
                die('Erro ao criar a conexão');
            }
            // define para que o PDO lance exceções caso ocorra erros
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //$pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

            return $pdo;
        } catch (PDOException $e) {
            // Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }*/

}
