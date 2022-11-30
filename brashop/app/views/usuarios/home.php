<!DOCTYPE html>
<html lang="pt-br">

  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../views/helpers/js" type="text/javascript"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
   

    <title>Brashop</title>
  </head>
 
  <body style ="background-color:black">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./UsuarioController.php?action=loadHomeLogin">Brashop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./UsuarioController.php?action=loadFormNew">Cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./UsuarioController.php?action=loadLogin">Logar</a>
      </li>
    </ul>
  </div>
  <form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<div class="container" >
    <div class="row">
    <div class="col mt-5">
        <?php
            print "<font color='white'>
            <h1>Bem vindo ao Brashop!</h1>
            </font>";

        ?>
</div>
</div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
