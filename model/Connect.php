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
        $this->sid = '10.1.1.9/orcl01';
        $this->tns = '(DESCRIPTION =
                        (ADDRESS = (PROTOCOL = TCP)(HOST = 10.1.1.9)(PORT = 1521))
                             (CONNECT_DATA =
                              (SERVER = DEDICATED)
                              (SERVICE_NAME = ORCL01)
                            )
                          )';
        $this->user = 'SYSTEM';
        $this->pass = '0000d121c554';
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