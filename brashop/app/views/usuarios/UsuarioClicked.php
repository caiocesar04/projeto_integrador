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
 else{
   include_once __DIR__ . "/../helpers/menuHome.php";
 }
    ?>
      <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th>Nome</th>
          <th>Foto Perfil<th>
          <th>Entrar em contato</th>
          </tr>
    <tr>
    <td><?= $data['usuario']->getNome(); ?></td>
    <td><img  style="height: 20px; border-radius : 100%;" src="../../imagens/<?= $data['usuario']->getFoto_Perfil(); ?>"></td>
    <td><a class="btn btn-primary" href="./ChatController.php?action=loadFormNew&id=<?= $data['usuario']->getId();?>">Conversar</a></td>                  
</ul>
                
                

                
    </ul>

    <p>
    
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
