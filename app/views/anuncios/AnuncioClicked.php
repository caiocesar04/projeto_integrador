<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../views/helpers/style-anuncios.css">
    <script src="../views/helpers/js" type="text/javascript"></script>
    <title>Anuncio</title>
</head>
<body class="AnuncioClicked">
	<?php
		if(isset($_SESSION["usuario"])){
        	if($_SESSION["usuario"]['is_adm'] == 1){
          		include_once __DIR__ . "/../helpers/menuAdm.php";
         	}else{
         		include_once __DIR__ . "/../helpers/menuLogin.php";
      	 	}
     	}
	?>
	<div class="main-side">
		<div class="left-side">
        	<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
            		<li data-target="#myCarousel" data-slide-to="3"></li>
            		<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img class="first-slide slide" src="../../imgs/<?= $data['anuncio']->getImagem();?>"></img>
					</div>
					<div class="item">
                		<img class="first-slide slide"  src="../../imgs/<?= $data['anuncio']->getImagem2();?>">
					</div>
                	<div class="item">
                		<img class="first-slide slide" src="../../imgs/<?= $data['anuncio']->getImagem3();?>">
					</div>
                	<div class="item">
                		<img class="first-slide slide"  src="../../imgs/<?= $data['anuncio']->getImagem4();?>">
					</div>
					<div class="item">
                		<img class="first-slide slide" src="../../imgs/<?= $data['anuncio']->getImagem5();?>">
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
		<div class="right-side">
    		<h1 class ="text"><?= $data['anuncio']->getNome(); ?>
    		<p class ="text"><?= $data['anuncio']->getDescricao(); ?>
			<p class ="text">R$:<?= $data['anuncio']->getPreco(); ?>
    		<p class ="text"><?= $data['anuncio']->nota; ?>
    		<a class="btn btn-outline-success my-2 my-sm-0" href="./UsuarioController.php?action=findUsuarioByClick&id=<?= $data['anuncio']->usuarios_id; ?>">Entrar em contato</a>
    		<a class="btn btn-outline-success my-2 my-sm-0" href="./AvaliacaoController.php?action=loadFormNew&id=<?= $data['anuncio']->getId(); ?>">Avaliar</a>
			<a class="btn btn-outline-danger my-2 my-sm-0" href="./ChatController.php?action=loadFormNew&id=99">Denunciar</a></h1>
		</div>
	</div>
</body>
</html>