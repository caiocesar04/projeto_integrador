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
	   }
	  }
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
<h2>Editar categoria</h2>

<?php foreach($data['categorias'] as $categoria): ?>
	<form action="./CategoriaController.php?action=update&id=<?= $categoria->getId()?>" method="POST">
	<div class="mb-3">	
	<label style="color:white; width:50%; margin-left:25%;" >Nome:</label> 
	<input style="color:white; background-color:black; width:50%; margin-left:25%;" type="text" name="nome" class="form-control" value="<?= $categoria->getNome(); ?>">
	</div>
		<div class="mb-3">
		<button style=" width:50%; margin-left:25%;"  type="submit" value="Atualizar" class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Atualizar</button>
	</form>		
<?php endforeach; ?>

</body>
</html>