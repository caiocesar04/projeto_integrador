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
    <form action="./UsuarioController.php?action=findUsuarioByName" method="POST">
     <h2 style= "color:white; text-align: center;">Procurar Alguém</h2>
     <div>
      <input style="width:50%; margin-left: 25%; background-color:black;" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome"  aria-label="Pesquisar" required>
      <button style=" width:50%; margin-left: 25%;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </div>
    </form>
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
    <td><a class="btn btn-danger" href="./DenunciaController.php?action=loadFormNew2&id=<?= $data['usuario']->getId(); ?>">Denunciar</a></td>                  
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
