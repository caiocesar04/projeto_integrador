<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/sliders.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/style-home.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>		
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
    <title>Brashop</title>
</head>
<?php
	include_once __DIR__ . "/../helpers/menuHome.php";
?>
<body>
	<form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
     	<h2>O que você busca?</h2>
     	<div>
      		<input class="pesquisa form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome" aria-label="Pesquisar" required>
			  <button style=" width:50%; margin-left: 25%;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    	</div>
    </form>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide slide" src="../../imgs/imagem1.png" alt="First slide">
          			<div class="carousel-caption d-none d-md-block">
                 		<h2 style="margin-bottom: -95px !important;">Encontre aqui produtos de seu interesse!</h2>
                 		<p><a class="btn btn-outline-success my-2 my-sm-0" href="./AnuncioController.php?action=findAll" role="button">Ver mais</a></p>
                	</div>
				</div>
				<div class="item">
					<img class="second-slide slide" src="../../imgs/imagem2.png" alt="Second slide">
          			<div class="carousel-caption d-none d-md-block">			
                 		<h2 style="margin-bottom: -95px !important;">Quer vender algo? Anuncie aqui!</h2>
                 		<p><a class="btn btn-outline-success my-2 my-sm-0" href="./AnuncioController.php?action=loadFormNew" role="button">Ver mais</a></p>
                  	</div>
				</div>
				<div class="item">
					<img class="third-slide slide" src="../../imgs/imagem3.png" alt="Third slide">
					<div class="container">
						<div class="carousel-caption">
						<h2 style="margin-bottom: -95px !important;">Brashop, o site de vendas que presa por você</h2>
						<p><a class="btn btn-outline-success my-2 my-sm-0" href="./AnuncioController.php?action=loadFormNew" role="button">Ver mais</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</body>
</html>