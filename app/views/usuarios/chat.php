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
<form method="post" action="./ChatController.php?action=create">
<section style="background-color: black;" >
<div class="container py-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-6">
      <div style="background-color: gray;"class="card" id="chat">
        <div style="background-color: #009c3b;"class="card-header d-flex justify-content-between align-items-center p-3">
          <h5 style="color: white;"class="mb-0">Chat</h5>
        </div>
        <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px; background-color: grey;">
        <?php
            foreach($data['chats'] as $conversa){
                echo"<p style='color: white;'>".$conversa["remetente"].": ".$conversa['mensagem']."</p>";
            }
        ?>
        <input type="hidden" name="destinatario_id" value="
        <?php
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            echo(@$queries['id']);
        ?>">
          <input style ="position: absolute; left: 0; bottom: 0; width: 80%; height: 8%; background-color: white;" type="text" class="form-control form-control-lg" name="mensagem" id="exampleFormControlInput1" placeholder="Mensagem">
          <input style ="position: absolute; right: 0; bottom: 0; width: 20%; height: 8%; background-color: #009c3b;" type="submit" value="Enviar">
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
