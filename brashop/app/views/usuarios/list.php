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
         <th>foto de perfil</th>
         <th>Sobre este Usuário:</th>
         </tr>
           <?php foreach($data['usuarios'] as $user): ?>
        
                
            
                
            
                 <tr>
                 <td><?= $user['nome'] ?></td>
                 <td><?= $user['email'] ?></td>
                 <td><?= $user['data_nasc'] ?></td> 
                 <td><img style="height: 50px; border-radius : 100%;" src="../../imgs/<?= $user['foto_perfil'] ?>"></img>
                 <td><a  class="btn btn-success" href="./AnuncioController.php?action=findAnuncioByUserClick&id=<?= $user['id'] ?>">Anuncios</a>
                 <a  class="btn btn-danger" href="./DenunciaController.php?action=findDenunciaUsuario&id=<?= $user['id'] ?>">Denuncias</a> 
                 <a  class="btn btn-primary" href="./UsuarioController.php?action=InsertAdmByUserId&id=<?= $user['id'] ?>">Tornar Administrador</a>
                 <a  class="btn btn-danger" href="./UsuarioController.php?action=Banir&id=<?= $user['id'] ?>">Banir</a>
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
