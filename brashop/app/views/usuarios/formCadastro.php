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
<h1> Cadastre-se </h1>
<form action="./UsuarioController.php?action=create" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
<div class="mb-3">
    <label>Nome:</label>
    <input type="text" name="nome" class="form-control" required>
</div>
<div class="mb-3">
    <label>Email:</label>
    <input type="email" name="email" class="form-control" required>
</div>
<div class="mb-3">
    <label>Senha:</label>
    <input type="password" name="senha" class="form-control" required>
</div>
<div class="mb-3">
    <label>Data de Nascimento:</label>
    <input type="date" name="data_nasc" class="form-control" required>
</div>
<div class="mb-3">
    <button type="submit" value="enviar" name="enviar" class="btn
    btn-primary">Enviar</button>
</div>
</form>
</body>