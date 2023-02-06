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
include_once __DIR__ . "/../helpers/menuAdm.php";
?>
<body style="background-color: black">
 
<form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
     <h2 style= "color:white; text-align: center;">O que você busca?</h2>
     <div>
      <input style=" width:50%; margin-left: 25%; background-color:black; item-align: center; background-color:black;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
    </div>
    </form>
 
  </html>  
</body>
