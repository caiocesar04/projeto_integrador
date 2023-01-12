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

 if(isset($_SESSION["usuario"])){
  include_once __DIR__ . "/../helpers/menuLogin.php";
}else{
  include_once __DIR__ . "/../helpers/menuHome.php";
}
?>

    <h1> Avaliacoes </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nota</th>
          </tr>
        <?php foreach($data['avaliacoes'] as $user): ?> 
          <tr>
          <td><?= $user['nota'] ?></td>         
        <?php endforeach; ?>
    </ul>

    <p>
     <a class="btn btn-primary" href="./AvaliacaoController.php?action=findAvaliacaoByUser" >Avaliações que eu fiz</a> 
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
