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
        $query = "  SELECT DDF.TABLESPACE_NAME AS TablespaceName,
                           DDF.FILE_NAME AS DATAFILE,
                           DDF.BYTES / (1024 * 1024) AS Total_MB,
                           ROUND((DDF.BYTES - SUM(NVL(DFS.BYTES, 0))) / (1024 * 1024), 1) AS Used_MB,
                           ROUND(SUM(NVL(DFS.BYTES, 0)) / (1024 * 1024), 1) AS Free_MB
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
}

/*
$db = new ConnectionTest();
foreach ( $db->selectAll('usuarios') as $sql){
    echo $sql['APELIDO'].'</br>';
}
echo "</hr>";
*/