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
<h2>Editar Avaliação</h2>

<?php foreach($data['avaliacoes'] as $avaliacao): ?>
	<form action="./AvaliacaoController.php?action=update&id=<?= $avaliacao->getId()?>" method="POST">
		<div class="mb-3">
		<label style="color:white; text-align:center;">Nota:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="number" name="nota"  pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="null" class="form-control" value="<?= $avaliacao->getNota(); ?>">
		</div>

		<div class="mb-3">
		<button style="width:50%; margin-left:25%;" type="submit" value="Atualizar" class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Atualizar</button>
	</form>		
<?php endforeach; ?>

</body>
</html>