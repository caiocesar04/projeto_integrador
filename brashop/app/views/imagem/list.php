<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>

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
    ?>
    <h1> Usuarios</h1>
    <ul>
      <table class = 'table table-hover-table-striped table-bordered'>
         <tr>
         <th>imagem</th>
         <th>Ações</th>
         </tr>
           <?php foreach($data['imagens'] as $user): ?>
         
          
                 <tr>
                 
                 <td><?= $user['path'] ?></td>
                 <td><a class="btn btn-success" href="./ImagemController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td> 
                <?php endforeach; ?>

                
           </ul>
    <p>
    
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>