<!DOCTYPE html>
<html lang="pt-br">

  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
   

    <title>Brashop</title>
  </head>
 
  <body style ="background-color:black">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container-fluid">
  <a class="navbar-brand active" href="./UsuarioController.php?action=loadHome">Brashop</a>
  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="dropdown-toggle" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
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