<?php

/*
 * ***********************************************
 * Objetivo:     Classe com funções php utilizadas
 *               por todo o projeto
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

class Functions extends Conexao {

    //VALORES PARA PULAR O LAÇO 
    public static $ignoreValues = Array("Acao", "token", "sqlInjection", "dirType", "ARQUIVOS");
    public static $ignoreWhereValues = Array("Acao", "token", "sqlInjection", "dirType", "ARQUIVOS");
    public static $ignoreSetValues = Array(
        "Acao", "token", "sqlInjection", "dirType", "ARQUIVOS", "ID_NEWSLETTER"
    );

    protected static function loadColumns($columns = null) {

        $strSeparator = "";
        $strCols = "";

        /* Retorna as Colunas, se existir */
        if ($columns != null) {
            foreach ($columns as $col) {
                $strCols .= $strSeparator . strtolower($col);
                $strSeparator = ",";
            }
        } else {
            $strCols = " * ";
        }
        return $strCols;
    }

    public static function paginate($tbName, $pkName, $start, $per_page) {

        try {
            /* Conexão */
            //$con = self::conectar();
            $con = new Conexao();

            /* Consulta */
            $sql = "    SELECT  * "
                    . " FROM    " . strtolower($tbName)
                    . " WHERE   1 = 1 "
                    . " ORDER BY $pkName "
                    . " LIMIT $start,$per_page ";

            /* Executa a consulta */
            $exec = $con->query($sql)->fetchAll();

            /* Retorna */
            return count($exec) > 0 ? $exec : false;
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    public static function doJoin($joins) {
        $join = '';
        /* PARA CADA JOIN */
        foreach ($joins as $tabela => $id) {

            /* VERIFICA SE UTILIZARÁ ON OU USING */
            if (strpos($id, "="))
                $operator = " ON ";
            else
                $operator = " USING ";

            /* CONCATENA O JOIN */
            $join .= " LEFT JOIN $tabela $operator ($id) ";
        }

        return $join;
    }

    public static function querySQL($sql) {

        try {
            /* Conexão */
            //$con = self::conectar();
            $con = new Conexao();

            /* Executa a consulta */
            $exec = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            /* Retorna */
            //return count($exec) > 0 ? $exec : false;
            return $exec;
        } catch (PDOException $e) {
            // Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    public static function all($tbName, $columns = null, $joins = null) {

        try {
            /* Conexão */
            //$con = self::conectar();
            $con = new Conexao();

            /* Separador */
            $strSeparator = '';

            /* Retorna As Colunas */
            $strCols = self::loadColumns($columns);

            /* INICIALIZA A VAR */
            $join = " ";

            /* CONCATENA OS JOINS */
            if ($joins != null)
                $join = self::doJoin($joins);

            /* Consulta */
            $sql = "    SELECT  $strCols "
                    . " FROM    " . strtolower($tbName)
                    . " $join "
                    . " WHERE   1 = 1 ";

            /* Executa a consulta */

            $exec = $con->query($sql)->fetchAll();
            //$exec = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            /* Retorna */
            return count($exec) > 0 ? $exec : false;
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    public static function lastId($tbName, $pk) {

        try {
            /* Conexão */
            //$con = self::conectar();
            $con = new Conexao();

            /* Inicializa a variavel */
            $id = null;

            /* Consulta */
            $sql = "    SELECT  MAX($pk) "
                    . " FROM    " . strtolower($tbName);

            /* Executa a consulta */
            $exec = $con->query($sql)->fetchAll(/* PDO::FETCH_ASSOC */);

            if (count($exec) > 0)
                foreach ($exec as $value) {
                    $id = $value;
                }

            /* Retorna */
            return $id != null ? $id : false;
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    public static function quoteValueTypes($value) {

        switch (gettype($value)) {
            case 'boolean':
            case 'integer':
            case 'float':
            case 'double':
                /* do nothing */
                break;
            case "string":
                $value = "'{$value}'";
                break;
        }
        return $value;
    }

    protected static function count($tbName, $arrConditionPairs = null) {

        try {
            /* Conexão */
            //$con = self::conectar();
            $con = new Conexao();

            $strSeparator = '';
            $strCountConditions = '';

            /* MONTA AS CONDIÇÕES */
            if ($arrConditionPairs != null) {
                foreach ($arrConditionPairs as $strCol => $strValue) {

                    $value = self::quoteValueTypes($strValue);

                    $strCountConditions = $strCountConditions . $strSeparator . strtolower($strCol) . " = " . $value;
                    $strSeparator = ' AND ';
                }

                /* FIRULA (¬¬) */
                $strCountConditions = '(' . $strCountConditions . ')';
            }

            /* Consulta */
            $sql = "    SELECT  count(*) "
                    . " FROM    " . strtolower($tbName)
                    . " WHERE   1 = 1 "
                    . " AND     $strCountConditions ";

            /* Executa a consulta */
            $exec = $con->query($sql)->fetchAll();

            return $exec[0][0];
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    protected static function find($tbName, $columns = null, $id) {
        try {

            //$con = self::conectar();
            $con = new Conexao();

            /* Retorna As Colunas */
            $strCols = self::loadColumns($columns);

            /* ID COL E ID VALUE */
            $col = key($id);
            $value = $id[$col];

            $sql = "    SELECT  $strCols "
                    . " FROM    " . strtolower($tbName)
                    . " WHERE   1 = 1 "
                    . " AND     $col = $value";

            /* Executa a consulta */
            $exec = $con->query($sql)->fetchAll(/* PDO::FETCH_ASSOC */);

            /* Retorna */
            return count($exec) > 0 ? $exec : false;
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            return $e->getMessage();
        }
    }

    protected static function SetParametersToIgnore($value) {

        /* IGNORA NO CASO DOS VALORES DO ARRAY */
        if (in_array($value, self::$ignoreSetValues))
            return true;
        else
            return false;
    }

    protected static function WhereParametersToIgnore($value) {

        /* IGNORA NO CASO DOS VALORES DO ARRAY */
        if (in_array($value, self::$ignoreWhereValues))
            return true;
        else
            return false;
    }

    protected static function ParametersToIgnore($value) {

        /* IGNORA NO CASO DOS VALORES DO ARRAY */
        if (in_array($value, self::$ignoreValues))
            return true;
        else
            return false;
    }

    protected static function Insert($strTableName, $arrValuePairs) {
        try {
            /* ABRE A CONEXÃO */
            //$con = self::conectar();
            $con = new Conexao();

            /* INICIA A TRANSAÇÃO, DESLIGA O AUTOCOMMIT */
            $con->beginTransaction();

            /* INICIALIZANDO VARIAVEIS */
            $i = 1;
            $strSeparator = '';
            $strCols = '';
            $strValues = '';

            /* MONTA AS COLUNAS E OS VALORES */
            foreach ($arrValuePairs as $strCol => $strValue) {

                /* IGNORA OS BOTÕES E INPUT HIDDEN */
                if (self::ParametersToIgnore($strCol))
                    continue;

                $strCols .= $strSeparator . ($strCol);
                $strValues .= $strSeparator . ":" . strtolower($strCol);

                $strSeparator = ',';
            }

            /* SQL */
            $sql = "INSERT INTO " . strtolower($strTableName) . " ($strCols) VALUES ($strValues)";
            //echo $sql;
            /* PREPARA PARA ENVIAR */
            $stmt = $con->prepare($sql);

            /* VALORES */
            foreach ($arrValuePairs as $strCol => $strValue) :

                /* IGNORA OS BOTÕES E INPUT HIDDEN */
                if (self::ParametersToIgnore($strCol))
                    continue;

                /* FORMATA O CAMPO DATA P/ MYSQL */
                if (preg_match('/(.*)?[dD]ata(.*)?/', $strCol))
                    $strValue = dataSQL($strValue);

                /* Retorna o valor validando caso sqlinjection <- CASO UPDATE... DEIXEI AQUI PRA SE CASO FOR UTILIZAR DEPOIS */
                //$protectedValue = $arrConditionPairs['sqlInjection'] == FALSE ? $strValue : self::_antiSqlInjection($strValue);

                $protectedValue = /* self::_antiSqlInjection */($strValue);

                /* Retorna o tipo dado */
                $valueType = self::getValueTypePDO($strValue);

                /* Vincula o valor */
                $stmt->bindValue(":" . strtolower($strCol), $protectedValue, $valueType);

            endforeach;

            /* EXEC O INSERT */
            $stmt->execute();
            /* PEGA O ID  */
            $lastInsertId = $con->lastInsertId();

            /* COMITA P/ BANCO */
            $con->commit();

            /* FECHA A CONEXÃO */
            $con = null;

            /* RETORNA */
            return $lastInsertId;
            //return true;
        } catch (PDOException $e) {
            // Caso ocorra uma exceção, exibe na tela
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    protected static function Update($strTableName, $arrValuePairs, $arrConditionPairs) {

        try {
            /* ABRE A CONEXÃO */
            //$con = self::conectar();
            $con = new Conexao();

            /* INICIA A TRANSAÇÃO, DESLIGA O AUTOCOMMIT */
            $con->beginTransaction();

            /* INICIALIZA AS VARIAVEIS */
            $strSeparator = '';
            $strSetStatements = '';
            $strUpdateConditions = '';
            $i = 1;

            /* MONTA OS VALORES */
            foreach ($arrValuePairs as $strCol => $strValue) {

                /* IGNORA OS BOTÕES E HIDDEN */
                if (self::SetParametersToIgnore($strCol))
                    continue;

                if ($strTableName == 'IMAGENS') {
                    if ($strCol == 'ID_IMAGEM')
                        continue;
                }
                if ($strTableName == 'TIPOS') {
                    if ($strCol == 'ID_TIPO')
                        continue;
                }

                /* NÃO PERMITE CONCATENAR O "ID_" PULANDO O LAÇO */
//                if ((preg_match('/ID_[aA-zZ]+/', $strCol)) && ($strCol != "ID_USUARIO"))
//                    continue;

                $strSetStatements = $strSetStatements . $strSeparator . strtolower($strCol) . " = :$strCol ";
                $strSeparator = ',';
            }

            /* LIMPA A VAR DO SEPARADOR PARA SER REUTILIZADA */
            $strSeparator = '';

            /* MONTA AS CONDIÇÕES */
            foreach ($arrConditionPairs as $strCol => $strValue) {

                /*  IGNORA OS BOTÕES E HIDDEN */
                if (self::WhereParametersToIgnore($strCol))
                    continue;

                /* NÃO PERMITE CONCATENAR O "ID_" PULANDO O LAÇO */
                //if ((preg_match('/ID_[aA-zZ]+/', $strCol)) && ($strCol != "ID_USUARIO"))
                //  continue;

                $strUpdateConditions = $strUpdateConditions . $strSeparator . strtolower($strCol) . " = :$strCol";
                $strSeparator = ' AND ';
            }

            /* FIRULA (¬¬) */
            $strUpdateConditions = '(' . $strUpdateConditions . ')';

            /* SQL */
            $sql = "UPDATE " . strtolower($strTableName) . " SET $strSetStatements WHERE $strUpdateConditions";

            /* PREPARA PARA ENVIAR */
            $stmt = $con->prepare($sql);

            /* VINCULA AS VALORES */
            foreach ($arrValuePairs as $strCol => $strValue) :
                /* IGNORA OS BOTÕES E INPUT HIDDEN */
                if (self::ParametersToIgnore($strCol))
                    continue;

                if ($strTableName == 'IMAGENS') {
                    if ($strCol == 'ID_IMAGEM')
                        continue;
                }
                if ($strTableName == 'TIPOS') {
                    if ($strCol == 'ID_TIPO')
                        continue;
                }

                /* FORMATA O CAMPO DATA P/ MYSQL */
                if (preg_match('/(.*)?[dD]ata(.*)?/', $strCol))
                    $strValue = dataSQL($strValue);

                /* NÃO PERMITE CONCATENAR O "ID_" PULANDO O LAÇO */
//                if ((preg_match('/ID_[aA-zZ]+/', $strCol)) && ($strCol != "ID_USUARIO"))
//                    continue;

                /* Retorna o valor validando caso sqlinjection */
                $protectedValue = isset($arrConditionPairs['sqlInjection']) == true && $arrConditionPairs['sqlInjection'] == false ? $strValue : self::_antiSqlInjection($strValue);

                /* Retorna o tipo dado */
                $valueType = self::getValueTypePDO($strValue);

                /* Vincula o valor */
                $stmt->bindValue(":$strCol", $protectedValue, $valueType);

            endforeach;

            /* VINCULA AS CONDIÇÕES */
            foreach ($arrConditionPairs as $strCol => $strValue) :

                /* IGN ORA OS BOTÕES E INPUT HIDDEN */
                if (self::ParametersToIgnore($strCol))
                    continue;

                /* Retorna o valor validando caso sqlinjection */
                $protectedValue = self::_antiSqlInjection($strValue);

                /* Retorna o tipo dado */
                $valueType = self::getValueTypePDO($strValue);

                /* Vincula o valor */
                $stmt->bindValue(":$strCol", $protectedValue, $valueType);

            endforeach;

            /* EXEC O UPDATE */
            $stmt->execute();

            /* COMITA P/ BANCO */
            $commit = $con->commit();

            /* FECHA A CONEXÃO */
            $con = null;

            /* RETORNA O ID AFETADO */
            return $commit;
        } catch (PDOException $e) {
            // Caso ocorra uma exceção, exibe na tela
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    protected static function Delete($strTableName, $arrConditionPairs/* , $strSeparator = " AND " */) {
        try {
            /* ABRE A CONEXÃO */
            //$con = self::conectar();
            $con = new Conexao();

            /* INICIA A TRANSAÇÃO, DESLIGA O AUTOCOMMIT */
            $con->beginTransaction();

            /* INICIALIZA A VARIAVEL */
            $strSeparator = '';
            $strDeleteConditions = '';

            /* MONTA AS CONDIÇÕES */
            foreach ($arrConditionPairs as $strCol => $strValue) {
                $strDeleteConditions = $strDeleteConditions . $strSeparator . $strCol . " = :$strCol";
                $strSeparator = ' AND ';
            }

            /* FIRULA (¬¬) */
            $strDeleteConditions = '(' . $strDeleteConditions . ')';

            /* SQL */
            $sql = ("DELETE FROM " . strtolower($strTableName) . " WHERE $strDeleteConditions");

            /* PREPARA PARA ENVIAR */
            $stmt = $con->prepare($sql);

            /* VINCULA AS CONDIÇÕES */
            foreach ($arrConditionPairs as $strCol => $strValue) :

                /* R eto r na  o v alor val idando caso sqlinjection */
                $protectedValue = self::_antiSqlInjection($strValue);

                /* Retorna o tipo dado */
                $valueType = self::getValueTypePDO($strValue);

                /* Vincula o valor */
                $stmt->bindValue(":$strCol", $protectedValue, $valueType);
            endforeach;

            /* EXEC O DELETE */
            $stmt->execute();

            /* COMITA P/ BANCO */
            $con->commit();

            /* FECHA A CONEXÃO */
            $con = null;

            /* RETORNA */
            return true;
        } catch (PDOException $e) {
// Caso ocorra uma exceção, exibe na tela
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public static function errorMsg($value) {
        switch ($value) {
//            case 0:
//            case UPLOAD_ERR_OK:
//                $msg = 'Não houve erro, o upload foi bem sucedido.';
//                break;
            case 1:
            case UPLOAD_ERR_INI_SIZE:
                $msg = 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.';
                break;
            case 2:
            case UPLOAD_ERR_FORM_SIZE:
                $msg = 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.';
                break;
            case 3:
            case UPLOAD_ERR_PARTIAL:
                $msg = 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML.';
                break;
            case 4:
            case UPLOAD_ERR_NO_FILE:
                $msg = 'Não foi feito o upload do arquivo.';
                break;
        }
        echo $msg;
    }

    public static function getValueTypePDO($value) {

        switch (gettype($value)) {
            case "boolean":
                return PDO::PARAM_BOOL;
                break;
            case "integer":
                return PDO::PARAM_INT;
                break;
            case "double" :
                return PDO::PARAM_STR;
                break;
            case "string":
                return PDO::PARAM_STR;
                break;
            //case  "NULL":
            //case "unknown type":
            case "array":
            case "object":
            case "resource":
            default:
                return null;
                break;
        }
    }

    public static function uploadFile($strDirName, $arrConditionPairs) {

        ini_set("upload_max_filesize", "2M");

        /* INICIALIZA A VAR DO RESULTADO */
        $result = Array('result' => true, 'rename' => false);

        /* VERIFICA ERROS */
        if ($_FILES["file"]["error"] > 0) {
            echo "<span style='color:red'><b>Error:</b> " . $_FILES["file"]["error"] . "</span><br>";
            return $result['result'] = false;
        }

        /* EXTENSÕES PERMITIDAS */
        $allowedExts = array('gif', 'jpeg', 'jpg', 'png', 'pdf', 'xls', 'doc', 'docx', 'ppt');

        /* TIPOS PERMITIDOS */
        $fileTypePerm = Array('application/octet-stream', 'image/gif', 'image/jpeg',
            'image/jpg', 'image/pjpeg', 'image/x-png', 'image/png', 'application/pdf',
            'application/xls', 'application/msword', 'application/vnd.ms-excel',
            'application/vnd.ms-powerpoint');

        /* QUEBRA O ARQUIVO EM UM VETOR  "ARRAY { [FILE] [EXT] }" */
        $extTemp = explode(".", $_FILES["file"]["name"]);

        /* NOME DO ARQUIVO */
        $fileName = self::_antiSqlInjection(current($extTemp));

        /* EXTENSÃO DO ARQUIVO */
        $fileExtension = end($extTemp);

        /* TIPO DO ARQUIVO */
        $fileType = $_FILES["file"]["type"];

        /* TAMANHO DO ARQUIVO */
        $fileSize = $_FILES["file"]["size"];

        /* TIPO DA PASTA DE ARMAZENAMENTO (FILE/IMG) */
        $dirType = $arrConditionPairs['dirType'];

        /*
         *  IF :
         *      - verifica o tipo do arquivo
         *      - tamanho do arquivo (deve ser menor que 2MB)
         *      - extensão do arquivo
         */

        if (
                (in_array($fileType, $fileTypePerm)) &&
                ($fileSize <= 2000000) &&
                in_array($fileExtension, $allowedExts)
        ) {

            /* CASO NÃO EXISTA O DIRETORIO, ENTÃO É CRIADO */
            if (!is_dir($dirType . '/' . $strDirName)) {
                echo mkdir($dirType . '/' . $strDirName, 0777); //COM PERMISSÃO DE LEITURA/ESCRITA
            }

            /* CAMINHO DA PASTA DE QUE SERÁ ARMAZENADO */
            $path = $dirType . '/' . $strDirName;

            /* ERRO - CASO JÁ EXISTA UM ARQUIVO COM ESSE NOME => RENOMEAR! */
            if (file_exists($path . '/' . $fileName . "." . $fileExtension)) {

                /* IMPRIME UM AVISO PARA O USUÁRIO */
                echo "<span style='color:red'>O arquivo com nome $fileName.$fileExtension já existe. Este será renomeado! </span><br/>";

                $result['rename'] = true;

                /* NOVO NOME DE ARQUIVO */
                $newFileName = $fileName . '_' . date('d_m_Y__H_i_s');
            }
        } else {
            echo "<span style='color:red'>Formato do arquivo inválido ou tamanho é acima do permitido (2MB).</span><br/>";
            return $result['result'] = false;
        }

        /* CASO TENHA SIDO NECESSÁRIO RENOMEAR O ARQUIVO */
        if ($result['rename'] == true) {
            $fileName = $newFileName;
            $_FILES['file']['name'] = "{$fileName}.{$fileExtension}"; //para poder dar o INSERT dps
            echo "<span style='color:red'>O arquivo foi renomeado com sucesso para {$fileName}.{$fileExtension}!</span><br/><br/>";
        }

        /* CAMINHO COMPLETO DO ARQUIVO */
        $fullPathFile = $path . '/' . $fileName . "." . $fileExtension;

        /* MOVE O ARQUIVO */
        if ($result['result'] == true) {
            $move = move_uploaded_file($_FILES['file']['tmp_name'], $fullPathFile);
        }

        /* RESULTADOS - 1) CASO TENHA SEJA MOVIDO - 2) CAMINHO COMPLETO */
        $result['result'] = $move;
        $result['fullPathFile'] = $fullPathFile;

        return $result;
    }

    public static function uploadGaleria($arrConditionPairs) {

        ini_set("upload_max_filesize", "2M");

        for ($i = 0; $i < count($_FILES['ARQUIVOS']['name']); $i++) {

            /* INICIALIZA A VAR DO RESULTADO */
            $result = Array('result' => true, 'rename' => false);

            /* VERIFICA ERROS */
            if ($_FILES['ARQUIVOS']["error"][$i] > 0) {
                echo "<span style='color:red'><b>Error:</b> " . $_FILES['ARQUIVOS']["error"][$i] . "</span><br>";
                return $result['result'] = false;
            }

            /* EXTENSÕES PERMITIDAS */
            $allowedExts = array("gif", "jpeg", "jpg", "png" /* , "pdf" */);

            /* TIPOS PERMITIDOS */
            $fileTypePerm = Array('application/octet-stream', "image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png"/* , "file/pdf" */);

            /* QUEBRA O ARQUIVO EM UM VETOR  "ARRAY { [FILE] [EXT] }" */
            $extTemp = explode(".", $_FILES['ARQUIVOS']['name'][$i]);

            /* NOME DO ARQUIVO */
            $fileName = self::_antiSqlInjection(current($extTemp));

            /* EXTENSÃO DO ARQUIVO */
            $fileExtension = end($extTemp);

            /* TIPO DO ARQUIVO */
            $fileType = $_FILES['ARQUIVOS']["type"][$i];

            /* TAMANHO DO ARQUIVO */
            $fileSize = $_FILES['ARQUIVOS']["size"][$i];

            /* TIPO DA PASTA DE ARMAZENAMENTO (FILE/IMG) */
            $dirType = $arrConditionPairs['dirType'];

            /*
             *  IF :
             *      - verifica o tipo do arquivo
             *      - tamanho do arquivo (deve ser menor que 2MB)
             *      - extensão do arquivo
             */

            if (
                    (in_array($fileType, $fileTypePerm)) &&
                    ($fileSize <= 2000000) &&
                    in_array($fileExtension, $allowedExts)
            ) {

                /* CASO NÃO EXISTA O DIRETORIO, ENTÃO É CRIADO */
                if (!is_dir($dirType . '/' . 'GALERIA_NOTICIAS')) {
                    mkdir($dirType . '/' . 'GALERIA_NOTICIAS', 0777); //COM PERMISSÃO DE LEITURA/ESCRITA
                }

                /* CAMINHO DA PASTA DE QUE SERÁ ARMAZENADO */
                $path = $dirType . '/' . 'GALERIA_NOTICIAS';

                /* ERRO - CASO JÁ EXISTA UM ARQUIVO COM ESSE NOME => RENOMEAR! */
                if (file_exists($path . '/' . $fileName . "." . $fileExtension)) {

                    /* IMPRIME UM AVISO PARA O USUÁRIO */
                    echo "<span style='color:red'>O arquivo com nome $fileName.$fileExtension já existe. Este será renomeado! </span><br/>";

                    $result['rename'] = true;

                    /* NOVO NOME DE ARQUIVO */
                    $newFileName = $fileName . '_' . date('d_m_Y__H_i_s');
                }
            } else {
                echo "<span style='color:red'>Formato do arquivo inválido ou tamanho é acima do permitido (2MB).</span><br/>";
                return $result['result'] = false;
            }

            /* CASO TENHA SIDO NECESSÁRIO RENOMEAR O ARQUIVO */
            if ($result['rename'] == true) {
                $fileName = $newFileName;
                $_FILES['ARQUIVOS']['name'][$i] = "{$fileName}.{$fileExtension}"; //para poder dar o INSERT dps
                echo "<span style='color:red'>O arquivo foi renomeado com sucesso para {$fileName}.{$fileExtension}!</span><br/><br/>";
            }

            /* CAMINHO COMPLETO DO ARQUIVO */
            $fullPathFile = $path . '/' . $fileName . "." . $fileExtension;

            /* MOVE O ARQUIVO */
            if ($result['result'] == true)
                $move = move_uploaded_file($_FILES['ARQUIVOS']['tmp_name'][$i], $fullPathFile);

            /* RESULTADOS - 1) CASO TENHA SEJA MOVIDO - 2) CAMINHO COMPLETO */
            $result['result'] = $move;
        }
        return $result;
    }

    public static function _antiSqlInjection($Target) {
        /*
         * Dica:
         *  1) Separe sempre a exibição de erros em 2 ambientes, o ambiente de desenvolvimento e o ambiente de produção
         *  O ambiênte de desenvolvimento pode ter qualquer tipode erro emitido na tela, afinal, você precisa ver os erros
         *  para tratá-los, no ambiênte de produção omita qualquer tipo de erro, qualquer erro pode ser uma pista para o
         *  hacker descobrir detalhes sobre o seu ambiênte.
         *
         *  Ambiente de Desenvolvimento:  <?php error_reporting(E_ALL ^ E_NOTICE);  ?>
         *  Ambiente de Produção: <?php error_reporting(0);  ?>
         *
         *  2) Para limitar spoofing de formulário, construa medidas para assegurar que as pessoas que estão fazendo as postagens
         *  são provavelmente quem dizem ser. Uma técnica que você pode usar é um token de uso único, que não impossibilita spoofing
         *  de seus formulários, mas torna bem difícil. Como o token é alterado toda vez que o formulário é desenhado, um possível
         *  atacador teria de obter uma instância do formulário de envio, remover o token e colocar em sua versão spoofing do formulário.
         *  Essa técnica torna muito improvável que alguém possa construir um formulário da Web permanente para postar pedidos indesejados
         *  em seu aplicativo.
         *  - Insira no começo do código: <?php session_start(); $token = md5(uniqid(rand(), true)); $_SESSION['token'] = $token; ?>
         *  - Insira um pouco mais abaixo: <?php if ($_SESSION['token'] == $_POST['token']) { // legal, está tudo bom... crie outro  } else { echo '<h1>Go away!</h1>'; }
         *  - Insira no formulario : <input type="hidden" name="token" value="<?php echo $token;
          ?>"/>
         *
         *  3) Para evitar buffer overflow attack seeks sempre limite o tamanho dos inputs utilizando size="20" maxlength="40"
         *  e ao receber esses dados inseridos, utilizar substr($_POST['name'],0,40); para garantir que a variavel está limitada
         *
         *
         */

        $sanitizeRules = array('CREATE', 'DROP', 'UPDATE', 'APPLET', 'OBJECT', /* 'OR', */ 'FROM', 'SELECT', 'INSERT', 'DELETE', 'WHERE', 'DROP TABLE', 'SHOW TABLES', "'", ";", /* "#", */ '*', '--', '-', '=');

        /* Esta função irá se certificar de eliminar espaços em branco do inicio e fim da string */
        $sanitized = trim($Target);

        /*
         * - Esta função adicionará uma barra invertida antes de cada barra simples ou dupla que apareça, processo esse conhecido como ESCAPE
         * - Remove palavras que podem ser ofensivas à integridade do banco
         */
        $sanitized = (!get_magic_quotes_gpc()) ? addslashes(str_ireplace($sanitizeRules, "", $sanitized)) : str_ireplace($sanitizeRules, "", $sanitized);

        /* Esta função serve para remover os carácteres especiais nos dados recebidos */
        //$sanitized = mysql_real_escape_string($sanitized);

        /* Esta função retirará todas as tags HTML e PHP dos dados fornecidos. */
        $sanitized = strip_tags($sanitized);

        /*
         * Para proteger-se contra ataques de XSS, filtre sua entrada através da função htmlentities()
         * sempre que o valor de uma variável for impresso na saída.
         *  */
        $sanitized = htmlentities($sanitized);

        /* Elimina caracteres Hexadecimais */
        $sanitized = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "", $sanitized);

        return $sanitized;
    }

    /* FIM CLASSE UTEIS */
}

?>