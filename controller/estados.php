<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 26/06/2017
 * Time: 16:52
 */
require "../model/SelectQuery.php";

echo json_encode(var_dump($_POST));

if ($_GET) {
    $sel = new SelectQuery();
    $estados = $sel->estados();
    echo json_encode($estados);
} else {
    echo json_encode(["status" => false, "msg" => "Nao veio estados por post"]);
}