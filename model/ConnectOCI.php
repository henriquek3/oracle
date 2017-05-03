<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 03/05/2017
 * Time: 14:14
 */

namespace Freitech\Model;


class ConnectOCI
{
    private $tns;
    private $db_username;
    private $db_password;

    public function connect($user,$pw)
    {
        $tns = "                      
          (DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-5BIM872)(PORT = 1521))
            (CONNECT_DATA =
              (SERVER = DEDICATED)
              (SERVICE_NAME = XE)
            )          
        ";

        $db_username = $user;
        $db_password = $pw;
        try{
            $conn = new \PDO("oci:dbname=".$tns,$db_username,$db_password);
        }catch(\PDOException $e){
            echo ($e->getMessage());
        }
    }
}


$oracle = new ConnectOCI();
echo "</hr>";
$oracle->connect('','');
echo "</hr>";
