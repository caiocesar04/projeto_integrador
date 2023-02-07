<?php
include_once __DIR__ . "/../helpers/mensagem.php";
include_once __DIR__."../../../repository/CategoriaRepository.php";
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../views/helpers/style-home.css">

  <nav style="background-color: #009c3b;" class="navbar navbar-expand-lg navbar-dark">
   <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./UsuarioController.php?action=loadHomeLogin">
        <img style="height: 25px;" src="../../imgs/brashop.png"></img>  
        Brashop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./AnuncioController.php?action=findAll">Anuncios</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img  style="height: 20px; border-radius : 100%;" src="../../imgs/<?=$_SESSION["usuario"]['foto_perfil']; ?>"></img>
        Perfil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./AnuncioController.php?action=findAnuncioByUser">Meus Anuncios</a>
          <a class="dropdown-item" href="./UsuarioController.php?action=findUsuarioByIdLogged">Meus Dados</a>
          <a class="dropdown-item" href="./UsuarioController.php?action=logout">Sair</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./AnuncioController.php?action=loadFormNew">Anunciar um produto</a>
          <a class="dropdown-item" href="./AnuncioController.php?action=loadFormNew">Mensagens</a>
          <a class="dropdown-item" href="./SugestaoController.php?action=findAll">Sugestões</a>
        </div>
      </li>
      
    </ul>
  </div>
</nav>
<style>
	</style>
	
  <footer>
	<p> Copyright © 2022-2023 Brahop LTDA. / CNPJ: 12.345.678/0009-10 / CEP: 85860-000 / Endereço: Av. Araucária, 780 - Vila A, Foz do Iguaçu - PR</p>
</footer>