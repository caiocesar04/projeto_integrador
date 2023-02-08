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
<h2>Editar foto</h2>
<?php foreach($data['usuarios'] as $usuario): ?>
	<form enctype="multipart/form-data" action="./UsuarioController.php?action=InsertFotoPerfil&id=<?= $usuario->getId()?>" method="POST">

	
	<div class="mb-3">
	<label>Foto Perfil(opcional):</label>
	<input type="file" name="foto_perfil" class="form-control" value="<?= $usuario->getFoto_Perfil(); ?>" required>
	</div>

		<div class="mb-3">
		<button type="submit" value="Atualizar" class="btn
    btn-primary">Atualizar</button>
		</div>
	</form>		
<?php endforeach; ?>

</body>
</html>