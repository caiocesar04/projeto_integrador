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
<h3> Faça uma sugestão, Seu Feedback é importante para melhorarmos nosso site! </h3>
<form action="./SugestaoController.php?action=create" method="POST">
   
<div class="mb-3">
    <label>Sugestão</label>
    <input type="text" name="texto" class="form-control" required>
</div>
<div class="mb-3">
    <button type="submit" value="enviar" name="enviar" class="btn
    btn-primary">Enviar</button>
</div>
</form>
</body>
