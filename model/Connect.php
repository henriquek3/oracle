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

    public function __construct()
    {
        $this->engine = 'oci';
        $this->sid = 'xe';
        $this->user = 'agricola';
        $this->pass = '0000d121c554';
        $dns = $this->engine . ':dbname=' . $this->sid;

        try {
            parent::__construct($dns, $this->user, $this->pass);
        } catch (\PDOException $exception) {
            echo $exception->getCode();
            echo "<br/>";
            echo $exception->getMessage();
        }
    }
}