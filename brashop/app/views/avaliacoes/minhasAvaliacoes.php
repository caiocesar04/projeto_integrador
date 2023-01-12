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

    <h1> Minhas Avaliações </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nota</th>
          </tr>
        <?php foreach($data['avaliacoes'] as $user): ?>
              
          <tr>
          <td><?= $user['nota'] ?></td>
          <td><a class="btn btn-success" href="./AvaliacaoController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td>
          <td><a class="btn btn-danger" href="javascript:confirmarExclusaoAnuncio('<?= $user['comentario'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                       
        <?php endforeach; ?>
    </ul>
    <p>
     <a class="btn btn-primary" href="./AvaliacaoController.php?action=loadFormNew"> Fazer uma nova avaliação</a> 
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
