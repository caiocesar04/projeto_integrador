<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Brashop</title>
  </head>
  <body>  <?php

include_once __DIR__ . "/../helpers/menuLogin.php";
?>


<h1> Anuncie um produto </h1>
<form action="./AnuncioController.php?action=create" method="POST">
   
<div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required>
</div>
<div class="mb-3">
    <label>Preço</label>
    <input type="number" name="preco" value="0.00" class="form-control" required>
</div>
<div class="mb-3">
    <label>Imagem</label>
    <input type="file" name="imagem" class="form-control" required>
</div>
<div class="mb-3">
    <button type="submit" value="enviar" name="enviar" class="btn
    btn-primary">Enviar</button>
</div>
</form>
</body>
