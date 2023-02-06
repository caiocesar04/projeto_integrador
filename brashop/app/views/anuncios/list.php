<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
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
<style>
*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
    background: white;
}
#container {
    max-width: 1024px;
    margin: 0 auto;
}
main {
    background: black;
    font-size: 20px;
    padding: 1rem;
}
footer {
    background: #6aabd2;
    height: 7rem;
}
 
.produto {  
  cursor: pointer; 
}
.produto p {
    color: white;
    padding: 5px 10px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    line-height: 150%;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
#produtos {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
.card{
  display: flex;
  justify-content: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.9);
  background: gray;
  width: 22%;
  height: 100%; 
  margin-bottom: 10px;
  margin-top: 10px;
  border-width: 3px;
}
 .select-estiloso { /* <div> */
       width: 240px;
       height: 34px;
       overflow: hidden;
       background: url(nova_setinha.jpg) no-repeat right #ddd; /* novo ícone para o <select> */
       border: 1px solid #ccc;
    }   

    .select-estiloso select { /* <select> */
       background: transparent; /* importante para exibir o novo ícone */
       width: 268px;
       padding: 5px;
       font-size: 16px;
       line-height: 1;
       border: 0;
       border-radius: 0;
       height: 34px;
       -webkit-appearance: none;
    }      

</style>

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
