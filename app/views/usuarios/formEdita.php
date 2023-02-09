<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Editar Dados</title>
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
<h2>Editar usuario</h2>
<?php foreach($data['usuarios'] as $usuario): ?>
	<form action="./UsuarioController.php?action=update&id=<?= $usuario->getId()?>" method="POST">
	<div class="mb-3">	
	<label style="color:white; width:50%; margin-left:25%;">Nome:</label> 
	<input  style="background-color:black; width:50%; margin-left:25%;" type="text" name="nome" class="form-control" value="<?= $usuario->getNome(); ?>">
	</div>


	<div class="mb-3">
	<label style="color:white; width:50%; margin-left:25%;">Email:</label>
	<input style="background-color:black; width:50%; margin-left:25%;" type="email" name="email" class="form-control" value="<?= $usuario->getEmail(); ?>">
	</div>
	
	<div class="mb-3">
	<label style="color:white; width:50%; margin-left:25%;">Senha:</label>
	<input style="background-color:black; width:50%; margin-left:25%;" type="password" name="senha" class="form-control" value="<?= $usuario->getSenha(); ?>">
	</div>
	
	<div class="mb-3">
	<label style="color:white; width:50%; margin-left:25%;">Data de Nascimento:</label>
	<input style="background-color:black; width:50%; margin-left:25%;" type="date" name="data_nasc" class="form-control" value="<?= $usuario->getData_nasc(); ?>">
	</div>

	<div class="mb-3">
	<label style="color:white; width:50%; margin-left:25%;">Digite sua Senha para  confirmar a edição dos dados:</label>
	<input style="background-color:black; width:50%; margin-left:25%;" type="password" name="confirmar_senha" class="form-control">
	</div>

		<div class="mb-3">
	<button style="width:50%; margin-left:25%;" type="submit" value="Atualizar" class="
		btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Atualizar</button>
		</div>
	</form>		
<?php endforeach; ?>

</body>
</html>