<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 26/06/2017
 * Time: 16:52
 */
require "../model/SelectQuery.php";


/*
 * echo json_encode($_POST); exit;
 * @param sem o exit a parada não funciona!!
 */


if (isset($_POST['select'])) {
    $sel = new SelectQuery();
    $estados = $sel->estados();
    echo json_encode($estados);
    exit;
} else if (isset($_POST['where'])) {
    $sel = new SelectQuery();
    $cidades = $sel->cidades($_POST['where']);
    echo json_encode($cidades);
    exit;
} else {
    echo json_encode(["status" => false, "msg" => "Erro"]);
    exit;
}