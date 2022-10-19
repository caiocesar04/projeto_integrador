<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
<h2>Editar anuncio</h2>
<p/>
<?php foreach($data['anuncios'] as $anuncio): ?>
	<form action="./AnuncioController.php?action=update&id=<?= $anuncio->getId()?>" method="POST">
		Nome: <input type="text" name="nome" value="<?= $anuncio->getNome(); ?>">
		<br>
		Preço: <input type="number" min="0.01" name="preco" value="<?= $anuncio->getPreco(); ?>">
		<br>
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		
<?php endforeach; ?>

</body>
</html>