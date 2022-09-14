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
<h2>Editar usuario</h2>
<p/>
<?php foreach($data['usuarios'] as $usuario): ?>
	<form action="./UsuarioController.php?action=update&id=<?= $usuario->getId()?>" method="POST">
		Nome: <input type="text" name="nome" value="<?= $usuario->getNome(); ?>">
		<br>
		Senha: <input type="text" name="senha" value="<?= $usuario->getSenha(); ?>">
		<br>
		Email: <input type="text" name="email" value="<?= $usuario->getEmail(); ?>">
		<break>
		Data de Nascimento: <input type="date" name="data_nasc" value="<?= $usuario->getData_nasc(); ?>">
		<p/>
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		
<?php endforeach; ?>

</body>
</html>