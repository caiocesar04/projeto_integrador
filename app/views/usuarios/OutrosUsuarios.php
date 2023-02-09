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

    <h1 style="color:white; text-align:center;" > Usuarios</h1>
    <form action="./UsuarioController.php?action=findUsuarioByName" method="POST">
<h2 style= "color:white; text-align: center;">Procurar Alguém</h2>
<div>
 <input style="width:50%; margin-left: 25%; background-color:black;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
 <button style=" width:50%; margin-left: 25%;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</div>
</form>
    <ul>
      <table class = 'table table-hover-table-striped table-bordered'>
         <tr>
         <th style="color:white;">Nome</th>
         <th style="color:white;">Email</th>
         <th style="color:white;">foto de perfil</th>
         <th style="color:white;">Sobre este Usuário:</th>
         </tr>
           <?php foreach($data['usuarios'] as $user): ?>
        
                  
            
                
            
                 <tr>
                 <td style="color:white;"><?= $user['nome'] ?></td>
                 <td style="color:white;"><?= $user['email'] ?></td>
                 <td ><img style="height: 50px; border-radius : 100%;" src="../../imgs/<?= $user['foto_perfil'] ?>"></img></td>
                 <td ><a class="btn btn-outline-success my-2 my-sm-0-success my-2 my-sm-0" href="./ChatController.php?action=loadFormNew&id=<?= $user['id'] ?>">Conversar</a>
                 <a class="btn btn-outline-danger my-2 my-sm-0" href="./ChatController.php?action=loadFormNew&id=90">Denunciar</a></td> 
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
