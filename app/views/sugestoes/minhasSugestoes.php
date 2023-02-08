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


    <h1 style="color:white; text-align:center;"> Sugestões </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th style="color:white">Sugestão</th>
          <th style="color:white">Ações</th>
          </tr>
        <?php foreach($data['sugestoes'] as $sugestao): ?>
              
          <tr>
          <td style="color:white"><?= $sugestao['texto'] ?></td>
          <td><a class="btn btn-outline-success my-2 my-sm-0" href="./SugestaoController.php?action=loadFormNew">Fazer uma nova sugestão</a>     
          <a class="btn btn-outline-success my-2 my-sm-0" href="./SugestaoController.php?action=edit&id=<?= $sugestao['id'] ?>">Editar</a>
          <a class="btn btn-outline-danger my-2 my-sm-0" href="javascript:confirmarExclusaoSugestao('<?= $sugestao['texto'] ?>', <?= $user['id'] ?>)">Excluir</a></td>
            
                       
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