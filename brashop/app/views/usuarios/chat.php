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
include_once __DIR__ . "/../helpers/menuLogin.php";
?>





<form method="post" action="./ChatController.php?action=create">
<section style="background-color: #eee;" >
<div class="container py-5">

  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-6">

      <div class="card" id="chat2">
        <div class="card-header d-flex justify-content-between align-items-center p-3">
          <h5 class="mb-0">Chat</h5>
        </div>
        <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
        <?php

            foreach($data['chat'] as $user){
             echo"<p>".$user['mensagem']."</p>";
            }?>
    
          <input type="text" class="form-control form-control-lg" name="mensagem" id="exampleFormControlInput1"
            placeholder="mensagem" >
             <input type="submit" value="Enviar">
          <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
          <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
          <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
        </div>
      </div>

    </div>
  </div>

</div>
</section>
</form>

    <?php
	include_once __DIR__ . "/../helpers/mensagem.php";
    ?>
    </body>
   
</html>
