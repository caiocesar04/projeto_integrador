<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
  <a class="navbar-brand active" href="./UsuarioController.php?action=loadHome">Brashop</a>
  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="dropdown-toggle" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>


    <h1> Anuncios </h1>
    
    <ul>
        <?php foreach($data['anuncios'] as $user):
        
            print "<table class = 'table table-hover-table-striped table-bordered'>";
                print "<tr>";
                print "<th>#</th>";
                print "<th>Nome</th>";
                print "<th>Preço</th>";
                print "</tr>";
            
                
            
            print "<td>".$user['id']."</td>";
             print "<td>".$user['nome']."</td>";
                 print "<td>".$user['preco']."</td>";?>
                [ <a href="./AnuncioController.php?action=edit&id=<?= $user['id'] ?>">Editar</a> ] 
                [ <a href="javascript:confirmarExclusaoAnuncio('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a> ]
                
                       
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./AnuncioController.php?action=loadFormNew">Anunciar novo Produto</a> ]
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
