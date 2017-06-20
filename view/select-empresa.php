<?php
require "../model/ConnectHome.php";
$db = new ConnectHome();
$stmt = $db->prepare("SELECT * FROM EMPRESAS");
$stmt->execute();
$res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
            foreach ($res as $item) {
                //echo '<option value="' . $item['COD_EMPRESA'] . '">' . $item['NOME_EMPRESA'] . '</option>';
                //echo '<button class="button"  value="' . $item['COD_EMPRESA'] . '" onclick="showCustomer(this.value)">'. $item['NOME_EMPRESA'] .'</button>';
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
    <div>
        <p id="demo">TESTE</p>
    </div>
</div>
<script src="js/select-empresa.js"></script>
<script>

</script>
</body>
</html>
