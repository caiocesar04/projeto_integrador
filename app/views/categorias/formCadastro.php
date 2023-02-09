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
include_once __DIR__ . "/../helpers/menuAdm.php";
?>

<h1 style="color:white; text-align:center;" > Criar nova Categoria </h1>
<form action="./CategoriaController.php?action=create" method="POST">
   
<div class="mb-3">
    <label style="color:white; width:50%; margin-left:25%;" >Nome</label>
    <input style="color:white; background-color:black; width:50%; margin-left:25%;"  type="text" name="nome" class="form-control" required>
</div>
<div class="mb-3">
    <button type="submit" value="enviar" name="enviar" class="btn
    btn-primary">Enviar</button>
</div>
</form>
</body>
