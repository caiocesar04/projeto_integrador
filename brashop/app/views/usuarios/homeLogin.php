
<!DOCTYPE html>
<html lang="pt-br">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
   

    <title>Brashop</title>
  </head>
 
  <body style ="background-color:black">
<?php
include_once __DIR__ . "/../helpers/menuLogin.php";
?>

<div class="container">
    <div class="row">
    <div class="col mt-5">
    <?php
           print "<font color='white'>
           <h1>Você está logado no Brashop!</h1>
           </font>";
;
        ?>
        <p>
    [ <a href="./UsuarioController.php?action=logout">sair</a> ]
       
</div>
</div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>