<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>

</head>
<body>

<?php
include_once __DIR__ . "/../helpers/menuLogin.php";
?>
<h1> Chat </h1>




<?php

foreach($data['chat'] as $user){
    echo"<h3>".$user['nome']."</h3>";
    echo"<p>".$user['mensagem']."</p>";
}
?>
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
    ?>
    </body>
    <?php
include_once __DIR__ . "/../helpers/menuChat.php";
?
</html>
