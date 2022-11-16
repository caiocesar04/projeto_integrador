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
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
<h2>Editar categoria</h2>

<?php foreach($data['categorias'] as $categoria): ?>
	<form action="./CategoriaController.php?action=update&id=<?= $categoria->getId()?>" method="POST">
	<div class="mb-3">	
	<label>Nome:</label> 
	<input type="text" name="nome" class="form-control" value="<?= $categoria->getNome(); ?>">
	</div>
		<div class="mb-3">
		<button type="submit" value="Atualizar" class="btn
    btn-primary">Atualizar</button>
		<button type="reset" value="Limpar"class="btn
    btn-primary">Limpar</button>
		</div>
	</form>		
<?php endforeach; ?>

</body>
</html>