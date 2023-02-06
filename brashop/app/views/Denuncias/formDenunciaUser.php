<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/helpers/css/bootstrap.min.css">
        <link rel="stylesheet" href="../views/helpers/style.css">
        <link rel="stylesheet"  href="../views/helpers/estrelas.css">
        <title> Brashop</title>
    </head>
    <body >
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
<!--<div class="estrelas">
  <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
  <label for="cm_star-1"><i class="fa"></i></label>
  <input type="radio" id="cm_star-1" name="fb" value="1"/>
  <label for="cm_star-2"><i class="fa"></i></label>
  <input type="radio" id="cm_star-2" name="fb" value="2"/>
  <label for="cm_star-3"><i class="fa"></i></label>
  <input type="radio" id="cm_star-3" name="fb" value="3"/>
  <label for="cm_star-4"><i class="fa"></i></label>
  <input type="radio" id="cm_star-4" name="fb" value="4"/>
  <label for="cm_star-5"><i class="fa"></i></label>
  <input type="radio" id="cm_star-5" name="fb" value="5"/>
</div>-->


        <div id="title">
            
            <form class="card col-md-10 mx-auto col-lg-5 p-4 p-md-5" action="./DenunciaController.php?action=createDenunciaUsuario" method="POST">
                <div class="card-header">
                    <h2>Denuncias</h2>
                </div>
                    <div class="card-content-area">
                    <label>Motivo da Denuncia</label>
                    <input type="text"  name="motivo" class="form-control" required>
<input type="hidden" name="anuncios_id" value="<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
echo(@$queries['id']);
?>">
                    </div>


                </div>
                <div class="card-footer">
                <button type="submit" value="enviar" name="denunciar" class="btn btn-primary">Denunciar</button>
                </div>
            </form>
        </div>
    </body>
</html>
