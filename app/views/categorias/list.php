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


    <h1 style="color:white; text-align:center"> Categorias </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th style="color:white; width:50%; margin-left:25%;">Nome</th>
          <th style="color:white; width:50%; margin-left:25%;">Ações</th>
          </tr>
        <?php foreach($data['categorias'] as $user): ?>
              
          <tr>
          <td style="color:white;"><?= $user['nome'] ?></td>
          <td style=""><a class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0" href="./CategoriaController.php?action=edit&id=<?= $user['id'] ?>">Editar</a>
          <a class="btn btn-outline-danger  my-2 my-sm-0-success my-2 my-sm-0" href="javascript:confirmarExclusaoCategoria('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                      
        <?php endforeach; ?>
    </ul>
    <div>
    <form action="./CategoriaController.php?action=findCategoriabyName" method="POST">
        <input style="background-color:black;"  class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
        <button class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    <p>
    </div>
    <a class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0" href="./CategoriaController.php?action=loadFormNew">Adicionar nova Categoria</a>
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
