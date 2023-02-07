<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/helpers/style-anuncios.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>
    <title>Anuncios</title>
</head>
<body style="background-color:black;">
<?php
  
 if(isset($_SESSION["usuario"])){
   if($_SESSION["usuario"]['is_adm'] == 1){
     include_once __DIR__ . "/../helpers/menuAdm.php";
    }else{
    include_once __DIR__ . "/../helpers/menuLogin.php";
  }
}
else{
  include_once __DIR__ . "/../helpers/menuHome.php";
}
?>
<form action="./AnuncioController.php?action=findAnunciobyName" method="POST">
     <h2 style= "color:white; text-align: center;">O que você busca?</h2>
     <div>
      <input style=" width:50%; margin-left: 25%; background-color:black;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
    </div>
    </form>

<form action="./AnuncioController.php?action=findAnuncioByCategoria" method="POST">
  <label style=" width:50%; margin-left: 25%; background-color:black;" for="categoria_id">  Buscar por Categoria:</label>
                   
        <select  name="categoria_id" id="categoria_id" required>
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

  <div id="container">
    <main>
      
      <section id="produtos">
      <?php foreach($data['anuncios'] as $user): ?>
        <div class="card">
        <section class="produto">

          <img style="width:100%; height: 150px;" src="../../imgs/<?=$user['imagem'];?>"></img>
          <p><?= $user['nome'] ?></p>
          <p>Preço: <?= $user['preco'] ?></p>
          <p><?= $user['descricao'] ?></p> 
          <p><a class="btn btn-primary" href="./AnuncioController.php?action=findAnuncioByClick&id=<?= $user['id'] ?>">Saiba mais...</a></p> 

        </section>
        </div>
        <?php endforeach; ?>
      </section>
    </main>
  </div>
</body>
</html>
