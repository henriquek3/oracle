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
        $query = "SELECT cd.SEQ_PLA_CIDADES, cd.NOME_CIDADE,cd.UF FROM cidades cd WHERE cd.UF = :uf ORDER BY cd.nome_cidade";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":uf", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function clientes()
    {
        $db = new Connet();
        $query = "SELECT CL.SEQ_PLA_CLIENTE, DECODE(CL.TIPO_CLIENTE, 'J', 'Juridica', 'F', 'Física'), CL.NOME_CLIENTE, CE.SEQ_PLA_CIDADES 
                    FROM CLIENTES CL, CLIENTES_ENDERECOS CE 
                   WHERE CE.SEQ_PLA_CLIENTE = CL.SEQ_PLA_CLIENTE                      
                   ORDER BY CL.NOME_CLIENTE";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fechAll();
    }
}