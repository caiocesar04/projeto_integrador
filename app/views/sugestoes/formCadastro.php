<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Brashop</title>
  </head>
  <?php
if(isset($_SESSION["usuario"])){
  if($_SESSION["usuario"]['is_adm'] == 1){
    include_once __DIR__ . "/../helpers/menuAdm.php";
   }else{
   include_once __DIR__ . "/../helpers/menuLogin.php";
 }
}
?>
  <body>
<h3 style="color:white; text-align:center;" > Faça uma sugestão, Seu Feedback é importante para melhorarmos nosso site! </h3>
<form action="./SugestaoController.php?action=create" method="POST">
   
<div class="mb-3">
    <label style="color:white; width:50%; margin-left:25%;">Sugestão</label>
    <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="text" name="texto" class="form-control" required>
</div>
<div class="mb-3">
    <button style=" width:50%; margin-left:25%;"  type="submit" value="enviar" name="enviar" class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Enviar</button>
</div>
</form>
</body>
