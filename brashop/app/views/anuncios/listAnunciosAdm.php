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
  if($_SESSION["usuario"]['is_adm'] == 1){
    include_once __DIR__ . "/../helpers/menuAdm.php";
   }else{
   include_once __DIR__ . "/../helpers/menuLogin.php";
 }
}
?>

    <h1> Anuncios </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th>Descricao<th>        
          <th>Ações</th>
          </tr>
        <?php foreach($data['anuncios'] as $user): ?>
              
          <tr>
          
          <td><?= $user['nome'] ?></td>
          <td><?= $user['preco'] ?></td>
          <td><?= $user['descricao'] ?></td>
          <td><img style="width:50px;" src="../../imgs/<?=$user['imagem'];?>"></img></td>
          <td><a class="btn btn-danger" href="./DenunciaController.php?action=findDenunciaAnuncio&id=('<?= $user['id'] ?>)">Denuncias</a>
          <td><a class="btn btn-danger" href="javascript:confirmarExclusaoAnuncio('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
                
                       
        <?php endforeach; ?>
    </ul>

    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>