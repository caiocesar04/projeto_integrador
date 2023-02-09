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
            <form  action="./UsuarioController.php?action=deleteUsuarioById&id=<?= $_SESSION['usuario']['id'] ?>" method="POST">
                <div >
                    <h2 style="color:white; text-align:center">Confirmar Exclusão de Conta</h2>
                </div>
                <div>
                    <div>
                    <label style="color:white; width:50%; margin-left:25%;" > Digite sua Senha</label>
                    <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="password" name="senha" class="form-control" required>
                    </div>
                <div>
                <button style="width:50%; margin-left:25%;"  type="submit" value="enviar" href="" name="enviar" class="btn btn-outline-success my-2 my-sm-0">Excluir</button>
                </div>
            </form>
        </div>
    </body>
</html>
