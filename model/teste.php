<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 03/05/2017
 * Time: 16:06
 */

$db_username = "agricola";
$db_password = "0000d121c554";
$db = "oci:dbname=xe";
$conn = new PDO($db,$db_username,$db_password);

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
echo "Conectado!";

