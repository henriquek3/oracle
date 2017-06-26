<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 26/06/2017
 * Time: 16:52
 */
require "../model/SelectQuery.php";
$sel = new SelectQuery();
$estados = $sel->estados();
echo json_encode(["estados" => $estados]);