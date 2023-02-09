<?
include_once __DIR__."../../../repository/CategoriaRepository.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/style-home.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/style-anuncios.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <title>Brashop</title>
  <nav style="background-color: #009c3b;" class="navbar navbar-expand-lg navbar-dark">
   <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./UsuarioController.php?action=loadHome">
        <img style="height: 25px;" src="../../imgs/brashop.png"></img>
        Brashop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./UsuarioController.php?action=loadFormNew">Cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./UsuarioController.php?action=loadLogin">Logar</a>
      </li>
      <li class="nav-item dropdown">
      </li>
    </ul>
  </div>
</nav>
  <footer>
	<p> Copyright © 2022-2023 Brahop LTDA. / CNPJ: 12.345.678/0009-10 / CEP: 85860-000 / Endereço: Av. Araucária, 780 - Vila A, Foz do Iguaçu - PR</p>
</footer>
