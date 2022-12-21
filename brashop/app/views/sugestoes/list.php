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


    <h1> Sugestões </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>#</th>
          <th>Sugestão</th>
          </tr>
        <?php foreach($data['sugestoes'] as $user): ?>
              
          <tr>
          <td><?= $user['id'] ?></td>
          <td><?= $user['texto'] ?></td>
          <td><a class="btn btn-success" href="./SugestaoController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td>
          <td><a class="btn btn-danger" href="javascript:confirmarExclusaoSugestao('<?= $user['texto'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                
                       
        <?php endforeach; ?>
    </ul>

    <p>
     <a class="btn btn-primary" href="./SugestaoController.php?action=loadFormNew">Fazer uma nova sugestão</a> 
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
