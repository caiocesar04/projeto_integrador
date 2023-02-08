<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/helpers/css/bootstrap.min.css">
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
    ?>

        <div id="title">
            <form class="card col-md-10 mx-auto col-lg-5 p-4 p-md-5" action="./UsuarioController.php?action=deleteUsuarioById&id=<?= $_SESSION['usuario']['id'] ?>" method="POST">
                <div class="card-header">
                    <h2>Confirmar Exclusão de Conta</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    </div>
                <div class="card-footer">
                <button type="submit" value="enviar" href="" name="enviar" class="btn btn-primary">Exlcuir</button>
                </div>
            </form>
        </div>
    </body>
</html>
