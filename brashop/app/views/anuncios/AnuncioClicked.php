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
	include_once __DIR__ . "/../helpers/mensagem.php";
	if(isset($_SESSION["usuario"])){
		if($_SESSION["usuario"]['is_adm'] == 1){
		  include_once __DIR__ . "/../helpers/menuAdm.php";
		 }else{
		 include_once __DIR__ . "/../helpers/menuLogin.php";
	   }
	 }
	 else{
	   include_once __DIR__ . "/../helpers/menuHome.php";
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
          </tr>
<?php foreach($data['anuncios'] as $anuncio): ?>
    <tr>
    <td><?= $anuncio->getNome(); ?></td>
    <td><?= $anuncio->getPreco(); ?></td>
	<td><img style="width:50px;" src="../../imagens/<?= $anuncio->getImagem();?>"></img></td>
    <td><?= $anuncio->getDescricao(); ?></td>

<?php endforeach; ?>
<td><a class="btn btn-primary" href="./AvaliacaoController.php?action=loadFormNew">Avaliar</a></td>
</ul>
</body>
</html>