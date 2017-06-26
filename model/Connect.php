<?php

#namespace Freitech\Model;

class Connect extends \PDO
{
    private $engine;
    private $sid;
    private $user;
    private $pass;
    public function __construct()
    {
        $this->engine = 'oci';
        $this->sid = 'localhost/suporte';
        $this->user = 'masutti';
        $this->pass = '0000D121C554';
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