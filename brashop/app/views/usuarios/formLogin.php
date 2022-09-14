<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Brashop</title>
  </head>
  <body>
  <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>

<h2>Login de usuarios</h2>

<form action="./UsuarioController.php?action=login" method="POST">
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email"  class="form-control" required>
<div class="mb-3">
    <label>Senha</label>
    <input type="password" name="senha" class="form-control" required>
</div>
<div class="mb-3">
    <button type="submit" value="entrar" name="entrar" class="btn
    btn-primary">Entrar</button>
</form>		

</body>
</html>