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

    <h1> Anuncios </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Imagem</th>
          </tr>
        <?php foreach($data['anuncios'] as $user): ?>
              
          <tr>
          <td><?= $user['id'] ?></td>
          <td><?= $user['nome'] ?></td>
          <td><?= $user['preco'] ?></td>
          <td><img style="width:50px;" src="../../imagens/<?=$user['imagem'];?>"></img></td>
                       
        <?php endforeach; ?>
    </ul>

  
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
