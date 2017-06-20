<?php
require "../vendor/autoload.php";

$db = new \Freitech\Views\ConnectionTest();
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" type="text/css" href="../vendor/semantic/ui/dist/semantic.min.css">
</head>
<body>
<div class="ui container">
    <table class="ui celled table">
        <thead>
        <tr>
            <th>TIPO_CLIENTE</th>
            <th>NOME_CLIENTE</th>
            <th>DESC_ENDERECO</th>
            <th>ENDERECO</th>
            <th>NUMERO</th>
            <th>BAIRRO</th>
            <th>CEP</th>
            <th>EMAIL</th>
            <th>TELEFONE</th>
            <th>CELULAR</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($db->selectClientes() as $item) {
            echo "<tr>";
            echo "<td>" . $item['TIPO_CLIENTE'] . "</td>";
            echo "<td>" . $item['NOME_CLIENTE'] . "</td>";
            echo "<td>" . $item['DESC_ENDERECO'] . "</td>";
            echo "<td>" . $item['ENDERECO'] . "</td>";
            echo "<td>" . $item['NUMERO'] . "</td>";
            echo "<td>" . $item['BAIRRO'] . "</td>";
            echo "<td>" . $item['CEP'] . "</td>";
            echo "<td>" . $item['EMAIL'] . "</td>";
            echo "<td>" . $item['TELEFONE'] . "</td>";
            echo "<td>" . $item['CELULAR'] . "</td>";
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
