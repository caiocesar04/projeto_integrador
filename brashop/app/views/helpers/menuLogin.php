<?php
include_once __DIR__ . "/../helpers/mensagem.php";
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

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
        <a class="nav-link" href="./SugestaoController.php?action=findAll">Sugestoes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./ChatController.php?action=findAll">Chat</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./AnuncioController.php?action=loadFormNew">Anunciar</a>
          <a class="dropdown-item" href="./AnuncioController.php?action=findAll">Anuncios</a>
          <a class="dropdown-item" href="./AnuncioController.php?action=findAnuncioByUser">Meus Anuncios</a>
          <a class="dropdown-item" href="./UsuarioController.php?action=findUsuarioByIdLogged">Meus Dados</a>
          <a class="dropdown-item" href="./UsuarioController.php?action=logout">Sair</a>
        </div>
      </li>
    </ul>
  </div>
  <form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>



