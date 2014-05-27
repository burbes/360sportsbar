<?php

include '../../lib/conexao.php';
include '../../lib/functions.php';
include '../../models/Associados.php';

/*
 * ***********************************************
 * Objetivo:     Listagem de Endereços via Ajax

 *               
 * Created on :  10/04/2014
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

$cols = Array('ID_ENDERECO', 'ENDERECO', 'CIDADE', 'UF');

$predicado = $_POST['ID_ENDERECO'] != '' ? " AND ID_ENDERECO = {$_POST['ID_ENDERECO']} " : null;

$sql = "     SELECT {$cols[0]},{$cols[1]},{$cols[2]},{$cols[3]}        
             FROM    enderecos
             WHERE   1 = 1
             $predicado ";

/*
  if (isset($_POST['ID_ENDERECO'])) {

  } else {
  $sql = " SELECT {$cols[0]},{$cols[1]},{$cols[2]},{$cols[3]}
  FROM    ENDERECOS
  WHERE   1 = 1
  AND     (
  ENDERECO LIKE '%{$_GET['query']}%'
  OR CIDADE LIKE '%{$_GET['query']}%'
  OR UF LIKE '%{$_GET['query']}%'
  ) ";
  $enderecos = Associados::listarEnderecos($sql);
  } */

$enderecos = Associados::listarEnderecos($sql);

$i = 0;

$result = "";

/* CASO TENHA REGISTRO */
if ($enderecos > 0 && $enderecos != false) {
    $separator = "";
    $result = "{";
    /* PARA CADA REGISTRO, É POPULADO OS DADOS */
    foreach ($enderecos as $e):
        $result .= $separator . " '{$e[$cols[0]]}' : '{$e[$cols[1]]}, {$e[$cols[2]]} - {$e[$cols[3]]}'";
        $separator = ",";
    endforeach;
    $result .= "}";
}

echo trim($result);
