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
    <h1 style="text-align: center; color:white;"> Meus Dados </h1>
    <ul>
      <table class = 'table table-hover-table-striped table-bordered'>
         <tr>
         <th style="color:white;">Nome</th>
         <th  style="color:white;">Email</th>
         <th  style="color:white;" >Data de Nascimento</th>
         <th  style="color:white;">Foto de Perfil</th>
         <th  style="color:white;">Ações</th>
         </tr>
           <?php foreach($data['usuarios'] as $user): ?>
         
          
                 <tr>
                 
                 <td style="color:white;"><?= $user['nome'] ?></td>
                 <td style="color:white;"><?= $user['email'] ?></td>
                 <td style="color:white;"><?= $user['data_nasc'] ?></td>
                 <td ><img style="height: 50px; border-radius : 100%;" src="../../imgs/<?= $user['foto_perfil'] ?>"></img>
                 <a class="btn btn-outline-success my-2 my-sm-0" href="./UsuarioController.php?action=editfotoPerfil&id=<?= $user['id'] ?>">Alterar Foto</a>
                 <a  class="btn btn-outline-danger my-2 my-sm-0" href="./UsuarioController.php?action=RetirarFotoPerfil&id=<?= $user['id'] ?>">Remover foto</a> </td>          
                 <td><a class="btn btn-outline-success my-2 my-sm-0" href="./UsuarioController.php?action=edit&id=<?= $user['id'] ?>">Editar</a> 
                 <a class="btn btn-outline-danger my-2 my-sm-0" href="./UsuarioController.php?action=loadFormDelete&id=<?= $user['id'] ?>">Excluir</a></td>
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
