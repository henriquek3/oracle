<?php
require "Connect.php";

class SelectQuery
{
    public function estados()
    {
        $db = new Connect();
        $query = "SELECT uf.uf, uf.descricao_uf FROM uf ORDER BY uf.uf";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function cidades($id)
    {
        $db = new Connect();
        $query = "SELECT cd.SEQ_PLA_CIDADES, cd.NOME_CIDADE,cd.UF FROM cidades cd WHERE cd.UF = :uf";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":uf", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}