<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/helpers/style.css">
        <title> Brashop</title>
    </head>
    <body>
    <?php
	include_once __DIR__ . "/../helpers/mensagem.php"; 
?>
        <div id="login">
            <form class="card" action="./UsuarioController.php?action=login" method="POST">
                <div class="card-header">
                    <h2>Login</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                    <label>Email</label>
                    <input type="email" name="email"  class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Login" class="submit">
                    <a href="#" class="recuperar_senha">Esqueceu a senha?(not working)</a>
                </div>
            </form>
        </div>
    </body>
</html>
