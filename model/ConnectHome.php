<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 03/05/2017
 * Time: 14:13
 */

namespace Freitech\Model;

class Connect extends \PDO
{
    private $engine;
    private $sid;
    private $user;
    private $pass;
    private $tns;

    public function __construct()
    {
        $this->engine = 'oci';
        $this->sid = 'localhost/xe';
        //$this->tns = '';
        $this->user = 'agricola';
        $this->pass = '0000D121C554';
        $dns = $this->engine . ':dbname=' . $this->sid; //$this->sid; Ambos nessa configuração conectaram sem problema

        try {
            parent::__construct($dns, $this->user, $this->pass);
        } catch (\PDOException $exception) {
            echo $exception->getCode();
            echo "<br/>";
            echo $exception->getMessage();
        }
    }
}

$db = new Connect();

$res = $db->prepare("SELECT * FROM FILIAIS");
$res->execute();
$resultado = $res->fetchAll(\PDO::FETCH_ASSOC);
foreach ($resultado as $kay) {
    echo "<pre>";
    echo $kay['SIGLA_FILIAL'];
    echo "</pre>";
}