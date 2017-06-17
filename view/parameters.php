<?php
require "../vendor/autoload.php";

$db = new \Freitech\Views\ConnectionTest();

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <!-- <link rel="stylesheet" type="text/css" href="../vendor/semantic/ui/dist/semantic.min.css"> -->
    <style>
        #tabela {
            margin: auto;
            height: 500px;
            width: 800px;
            overflow-y: scroll;
        }

        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td ~ td {
            background-color: orange;
            overflow: hidden;
            text-overflow: clip;
        }

    </style>
</head>
<body>
<div class="ui container" id="tabela">
    <table class="ui celled table">
        <thead>
        <tr>
            <th>NAME</th>
            <th>VALUE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($db->teste() as $item) {
            echo "<tr>";
            echo "<td>" . $item['NAME'] . "</td>";
            echo "<td>" . $item['VALUE'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
