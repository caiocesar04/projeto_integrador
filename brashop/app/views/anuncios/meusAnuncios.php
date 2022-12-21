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
          <td><a class="btn btn-success" href="./AnuncioController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td>
          <td><a class="btn btn-danger" href="javascript:confirmarExclusaoAnuncio('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                
                       
        <?php endforeach; ?>
    </ul>

    <p>
     <a class="btn btn-primary" href="./AnuncioController.php?action=loadFormNew" >Anunciar novo Produto</a> 
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
