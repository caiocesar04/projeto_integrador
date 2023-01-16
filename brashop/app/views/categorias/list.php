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
include_once __DIR__ . "/../helpers/menuAdm.php";
?>


    <h1> Categorias </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nome</th>
         
          </tr>
        <?php foreach($data['categorias'] as $user): ?>
              
          <tr>
          <td><?= $user['nome'] ?></td>
          <td><a class="btn btn-success" href="./CategoriaController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td>
          <td><a class="btn btn-danger" href="javascript:confirmarExclusaoCategoria('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                
                       
        <?php endforeach; ?>
    </ul>

    <p>
    <a class="btn btn-primary" href="./CategoriaController.php?action=loadFormNew">Adicionar nova Categoria</a>
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
