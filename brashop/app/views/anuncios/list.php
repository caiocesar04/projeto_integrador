<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>
    <title>Anuncios</title>
</head>
<body>
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
    background: darkgray;
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
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  background: gray;
  width: 22%;
  height: 100%; 
  margin-bottom: 10px;
  margin-top: 10px;
  border-width: 3px;
}

</style>

  <div id="container">
    <main>
      
      <section id="produtos">
      <?php foreach($data['anuncios'] as $user): ?>
        <div class="card">
        <section class="produto">

          <img style="width:100%; height: 150px;" src="../../imagens/<?=$user['imagem'];?>"></img>
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
