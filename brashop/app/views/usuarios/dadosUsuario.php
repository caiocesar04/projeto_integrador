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
    <h1> Usuarios</h1>
    <ul>
      <table class = 'table table-hover-table-striped table-bordered'>
         <tr>
         <th>Nome</th>
         <th>Email</th>
         <th>Data de Nascimento</th>
         <th>Foto de Perfil</th>
         </tr>
           <?php foreach($data['usuarios'] as $user): ?>
         
          
                 <tr>
                 
                 <td><?= $user['nome'] ?></td>
                 <td><?= $user['email'] ?></td>
                 <td><?= $user['data_nasc'] ?></td>
                 <td><img style="height: 50px; border-radius : 100%;" src="../../imagens/<?= $user['foto_perfil'] ?>"></img></td>  
                 <td><a class="btn btn-primary" href="./UsuarioController.php?action=findUsuarioByClick&id=<?= $user['id'] ?>">Entrar em contato</a></td>              
                 <td><a class="btn btn-success" href="./UsuarioController.php?action=edit&id=<?= $user['id'] ?>">Editar</a></td> 
                 <td><a class="btn btn-danger" href="javascript:confirmarExclusaoUsuario('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
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
