<?php
require "../model/Connect.php";
$db = new Connect();

$stmt = $db->prepare("SELECT * FROM EMPRESAS");
$stmt->execute();
$res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="empresa">
    <label for="empresa">Empresa</label>
    <select name="empresa" id="empresa" onchange="showCustomer(this.value)">
        <option value="" selected> - // -</option>
        <?php
        foreach ($res as $item) {
            echo '<option value="' . $item['COD_EMPRESA'] . '">' . $item['NOME_EMPRESA'] . '</option>';
        }
        ?>
    </select>
</div>
<div class="filial">
    <label for="filial">Filiais</label>
    <select name="filiais" id="filiais">
    </select>
</div>
<div id="resposta"></div>
<p style="background-color: red;color: yellow;font-size: 20px" id="amostra"></p>
<script>
    function showCustomer(str) {
        var xhttp;
        if (str == "") {
            document.getElementById("empresa").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("filiais").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax.php?empresa=" + str, true);
        xhttp.send();
    }
</script>
</body>
</html>
