<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Document</title>
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
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
  <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th>Imagem</th>
          <th>Informações</th>
          <th>Nota</th>
          <th>Entrar em contato</th>
          </tr>
    <tr>
    <td><?= $data['anuncio']->getNome(); ?></td>
    <td><?= $data['anuncio']->getPreco(); ?></td>
	<td><img style="width:50px;" src="../../imgs/<?= $data['anuncio']->getImagem();?>"></img></td>
    <td><?= $data['anuncio']->getDescricao(); ?></td>
    <td><?= $data['anuncio']->nota; ?></td>
    <td><a class="btn btn-primary" href="./AvaliacaoController.php?action=loadFormNew&id=<?= $data['anuncio']->getId(); ?>">Avaliar</a></td>
</ul>
</body>
</html>