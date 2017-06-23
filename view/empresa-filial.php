<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 20/06/2017
 * Time: 20:59
 */
namespace Freitech\View;
use Freitech\Model\querySelectAll;

require '../vendor/autoload.php';
$emp = new querySelectAll();

$resEMp = $emp->selectTable('empresas', '*', '100');
var_dump($resEMp);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
           maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Empresa</title>
    <link rel="stylesheet" href="css/select-empresa.css">
</head>
<body>
<div class="select">
    <div class="empresas">
        <span class="label-empresas">Empresas</span>
        <div class="empresa-option">
            <?php
            foreach ($emp as $item) {
                echo '<button class="button"  value="' . $item['COD_EMPRESA'] . '">' . $item['NOME_EMPRESA'] . '</button>';
            }
            ?>
        </div>
    </div>
    <div class="filiais">
        <span class="label-filiais">Filiais</span>
        <div class="filiais-options" id="filiais">
            <button class="button" type="hidden">Filiais</button>
        </div>
    </div>
</div>
<script src="js/select-empresa.js"></script>
</body>
</html>
