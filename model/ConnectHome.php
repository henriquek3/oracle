<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 03/05/2017
 * Time: 14:13
 */
//namespace Freitech\Model;

class ConnectHome extends \PDO
{
    private $engine;
    private $sid;
    private $user;
    private $pass;

    //private $tns;

    public function __construct()
    {
        $this->engine = 'oci';
        $this->sid = 'localhost/suporte';
        $this->user = 'masutti';
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