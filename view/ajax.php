<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 19/06/2017
 * Time: 22:27
 */
require "../model/Connect.php";

$empresa = $_GET['empresa'];
$db = new Connect();
$res = $db->prepare("SELECT * FROM FILIAIS WHERE COD_EMPRESA = " . $empresa);
$res->execute();
$resultado = $res->fetchAll(\PDO::FETCH_ASSOC);

foreach ($resultado as $kay) {
    //echo "<pre>";
    //echo $kay['SIGLA_FILIAL'];
    //echo '<option value="' . $kay['COD_FILIAL'] . '">' . $kay['SIGLA_FILIAL'] . '</option>';
    echo '<button class="button">' . $kay['SIGLA_FILIAL'] . '</button>';
    //echo "</pre>";
}
