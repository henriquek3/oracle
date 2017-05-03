<?php
/**
 * Created by PhpStorm.
 * User: henri
 * Date: 03/05/2017
 * Time: 16:40
 */

require "../vendor/autoload.php";

$db = new \Freitech\Views\ConnectionTest();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../vendor/semantic/ui/dist/semantic.min.css">
</head>
<body>
    <div class="ui container">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>TablespaceName</th>
                <th>DATAFILE</th>
                <th>Total_MB</th>
                <th>Used_MB</th>
                <th>Free_MB</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($db->verificaEspacoLivre() as $item){
                    echo "<tr>";
                    echo "<td>".$item['TablespaceName']."</td>";
                    echo "<td>".$item['DATAFILE']."</td>";
                    echo "<td>".$item['Total_MB']."</td>";
                    echo "<td>".$item['Used_MB']."</td>";
                    echo "<td>".$item['Free_MB']."</td>";
                }
            ?>
            </tbody>
            <tfoot>
            <tr><th>3 People</th>
                <th>2 Approved</th>
                <th></th>
            </tr></tfoot>
        </table>
    </div>
</body>
</html>
