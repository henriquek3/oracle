<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 20/06/2017
 * Time: 21:09
 */

namespace Freitech\Model;

class querySelectAll
{
    private $table;
    private $column;
    private $limit;

    public function selectTable($table, $column = "", $limit = "")
    {
        $this->table = $table;
        $this->column = $column;
        $this->limit = $limit;
        $sql = "SELECT :column FROM :table WHERE ROWNUM <= :limit";
        $pdo = new Connect();
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':column', $this->column);
        $statement->bindValue(':table', $this->table);
        $statement->bindValue(':limit', $this->limit);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}