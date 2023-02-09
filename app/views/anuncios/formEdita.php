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
<h2  style="color:white; text-align:cente;">Editar anuncio</h2>

<?php foreach($data['anuncios'] as $anuncio): ?>
	<form enctype="multipart/form-data" action="./AnuncioController.php?action=update&id=<?= $anuncio->getId()?>" method="POST">
	<div class="mb-3">	
	<label  style="color:white; width:50%; margin-left:25%;">Nome:</label> 
	<input  style="color:white;  background-color:black; width:50%; margin-left:25%;" type="text" name="nome" class="form-control" value="<?= $anuncio->getNome(); ?>">
	</div>

		<div class="mb-3">
		<label style="color:white; width:50%; margin-left:25%;">Preço:</label>
		 <input  style="color:white; background-color:black; width:50%; margin-left:25%;" type="number" name="preco"  pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="null" class="form-control" value="<?= $anuncio->getPreco(); ?>">
		</div>
		<div class="mb-3">
		<label style="color:white; width:50%; margin-left:25%;">imagem:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem" class="form-control" value="<?= $anuncio->getImagem(); ?>">
		</div>
		<label style="color:white; width:50%; margin-left:25%;">imagem 2:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem2" class="form-control" value="<?= $anuncio->getImagem2(); ?>">
		</div>
		<label style="color:white; width:50%; margin-left:25%;">imagem 3:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem3" class="form-control" value="<?= $anuncio->getImagem3(); ?>">
		</div>
		<label style="color:white; width:50%; margin-left:25%;">imagem 4:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem4" class="form-control" value="<?= $anuncio->getImagem4(); ?>">
		</div>
		<label style="color:white; width:50%; margin-left:25%;">imagem 5:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem5" class="form-control" value="<?= $anuncio->getImagem5(); ?>">
		</div>
		<div class="mb-3">
		<label style="color:white; width:50%; margin-left:25%;">Descricao:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="text" name="descricao" class="form-control" value="<?= $anuncio->getDescricao(); ?>" required>
		</div>
		<div class="mb-3">
		<button style="width:50%; margin-left:25%;" type="submit" value="Atualizar" class="btn
		btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Atualizar</button>
	</form>		
<?php endforeach; ?>

</body>
</html>