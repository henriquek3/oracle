<?php

namespace Freitech\Views;

use Freitech\Model\Connect;

require "../vendor/autoload.php";

class ConnectionTest
{
    public function selectAll($table)
    {
        $pdo = new Connect();
        $result = $pdo->prepare('select * from '.$table);
        $result->execute();
        $resultado = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function verificaEspacoLivre()
    {
        $query = "  SELECT DDF.TABLESPACE_NAME AS TABLESPACE_NAME,
                           DDF.FILE_NAME AS DATAFILE,
                           DDF.BYTES / (1024 * 1024) AS TOTAL_MB,
                           ROUND((DDF.BYTES - SUM(NVL(DFS.BYTES, 0))) / (1024 * 1024), 1) AS USED_MB,
                           ROUND(SUM(NVL(DFS.BYTES, 0)) / (1024 * 1024), 1) AS FREE_MB
                      FROM SYS.DBA_FREE_SPACE DFS
                 LEFT JOIN SYS.DBA_DATA_FILES DDF
                        ON DFS.FILE_ID = DDF.FILE_ID
                     GROUP BY DDF.TABLESPACE_NAME, DDF.FILE_NAME, DDF.BYTES
                     ORDER BY DDF.TABLESPACE_NAME, DDF.FILE_NAME";
        $pdo = new Connect();
        $result = $pdo->prepare($query);
        $result->execute();
        $resultado = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    }


    public function selectClientes()
    {
        $pdo = new Connect();
        $sql = "SELECT DECODE(cl.TIPO_CLIENTE,
                            'F','Pessoa Física',
                            'J','Pessoa Jurídica') AS TIPO_CLIENTE,
                            cl.NOME_CLIENTE,
                            ce.DESC_ENDERECO,
                            ce.DESC_ENDERECO,
                            ce.ENDERECO,
                            ce.NUMERO,
                            ce.BAIRRO,
                            ce.CEP,
                            ce.EMAIL,
                            ce.TELEFONE,
                            cl.CELULAR
                       FROM clientes cl,
                            CLIENTES_ENDERECOS ce
                      WHERE ce.SEQ_PLA_CLIENTE= cl.SEQ_PLA_CLIENTE
                      AND   ROWNUM < 10;";
        $result = $pdo->prepare($sql);
        $result->execute();
        $resultado = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function teste()
    {
        $sql = " SELECT NAME,VALUE 
                FROM v\$parameter A
                --WHERE NAME 
                --LIKE '%nls%'";
        $pdo = new Connect();
        $result = $pdo->prepare($sql);
        $result->execute();
        $resultado = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
    }
}

/*$db = new ConnectionTest();
foreach ( $db->teste() as $sql){
    echo $sql['NAME'].'</br>';
    echo $sql['VALUE'].'</br>';
}
echo "<hr/>";
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1 );

foreach ($db->selectClientes() as $value) {
  # code...
  echo $value['NOME_CLIENTE'] . "<br/>";
}*/