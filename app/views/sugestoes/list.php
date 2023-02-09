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


    <h1 style="color:white; text-align:center;" > Sugestões </h1>
    
    <ul>
      <td><table class = 'table table-hover-table-striped table-bordered'></td>
          <tr>
          <th style="color:white" >Sugestão</th>
          </tr>
        <?php foreach($data['sugestoes'] as $user): ?>
              
          <tr>
          <td style="color:white"><?= $user['texto'] ?></td>
        
                       
        <?php endforeach; ?>
    </ul>

    <p>
     <a class="btn btn-outline-success my-2 my-sm-0"  href="./SugestaoController.php?action=findSugestaoByUser">Minhas Sugestões</a> 
    <a class="btn btn-outline-success my-2 my-sm-0" href="./SugestaoController.php?action=loadFormNew">Fazer uma sugestão</a>  
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
</body>
</html>
