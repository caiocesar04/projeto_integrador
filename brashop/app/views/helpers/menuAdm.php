<?php
include_once __DIR__ . "/../helpers/mensagem.php";
include_once __DIR__."../../../repository/CategoriaRepository.php";
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <nav style="background-color: black;" class="navbar navbar-expand-lg navbar-dark">
   <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./UsuarioController.php?action=loadAdm">Brashop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./AnuncioController.php?action=findAll">Anuncios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img  style="height: 20px; border-radius : 100%;" src="../../imagens/<?=$_SESSION["usuario"]['foto_perfil']; ?>"></img>
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
          <a class="dropdown-item" href="./CategoriaController.php?action=findAll">Categorias</a>
          <a class="dropdown-item" href="./SugestaoController.php?action=findAll">Sugestões</a>
          <a class="dropdown-item" href="./UsuarioController.php?action=findAll">Usuarios</a>
        </div>
      </li>
    </ul>
  </div>
  <form action="./AnuncioController.php?action=findAnuncioByCategoria" method="POST">
  <label for="categoria_id">Categoria:</label>
                   
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Selecionar</option>
        <?php
          
          $categoriaRepository = new CategoriaRepository();
          $categorias = $categoriaRepository->findAll();
        foreach ($categorias as $key => $categoria) {
            echo '<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';
        }
        ?>
      </select>
      <button style = "background-color: #ffdf00;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
  <form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
      <button style = "background-color: #ffdf00;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</nav>



