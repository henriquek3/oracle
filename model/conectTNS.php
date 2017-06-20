<?php
$tns = "  
    (DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = JeanFreitas)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )  
       ";
$db_username = "AGRICOLA";
$db_password = "0000D121C554";
try {
    $conn = new PDO("oci:dbname=" . $tns, $db_username, $db_password);
} catch (PDOException $e) {
    echo($e->getMessage());
}