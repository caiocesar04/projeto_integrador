<!DOCTYPE html>
<html lang="pt-br">

  <head>
 
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/sliders.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/styless.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
   

    <title>Brashop</title>
  </head>
 
  <body style ="background-color:black">
  <?php
	include_once __DIR__ . "/../helpers/menuHome.php";
?>
<form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
     <h2 style= "color:white; text-align: center;">O que você busca?</h2>
     <div>
      <input style=" width:50%; margin-left: 25%; background-color:black;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
    </div>
    </form>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="first-slide" style="width:50%; margin-left: 25%;"  src="../../imgs/imagem1.png" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
		  <br>
                 <h2 >Encontre aqui produtos de seu interesse!</h2>
                 <p><a class="btn btn-outline-success my-2 my-sm-0" href="./AnuncioController.php?action=findAll" role="button">Ver mais</a></p>
                  </div>
					</div>
				<div class="item">
					<img class="second-slide" style="width:50%; margin-left: 25%;"  src="../../imgs/imagem2.png" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
			<br>
                 <h2>Quer vender algo? Anuncie aqui!</h2>
                 <p>Você pode anunciar seus produtos em nosso site sem gastar nada!</p>
                 <p><a class="btn btn-outline-success my-2 my-sm-0" href="./AnuncioController.php?action=loadFormNew" role="button">Ver mais</a></p>
                  </div>
				</div>
				<div class="item">
					 <img class="third-slide" style="width:50%; margin-left: 25%;"  src="imagens/imagem3.png" alt="Third slide">
					<div class="container">
						<div class="carousel-caption">
							<p><a class="btn btn-lg btn-primary" href="" role="button">Ver mais</a></p>
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
		</div><!-- /.carousel -->

		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>		
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>


    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
