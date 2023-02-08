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
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
<h2>Editar Sugestao</h2>

<?php foreach($data['sugestoes'] as $sugestao): ?>
	<form action="./SugestaoController.php?action=update&id=<?= $sugestao->getId()?>" method="POST">
	<div class="mb-3">	
	<label>Sugestao:</label> 
	<input type="text" name="texto" class="form-control" value="<?= $sugestao->getTexto(); ?>">
	</div>

		<div class="mb-3">
		<button type="submit" value="Atualizar" class="btn
    btn-primary">Atualizar</button>
		<button type="reset" value="Limpar"class="btn
    btn-primary">Limpar</button>
		</div>
<?php endforeach; ?>

</body>
</html>