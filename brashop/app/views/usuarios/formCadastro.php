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
        <div id="title">
            <form class="card" action="./UsuarioController.php?action=login" method="POST">
                <div class="card-header">
                    <h2>Cadastre-se</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                    <label>Nome</label>
                    <input type="text" name="nome"  class="form-control" required>
                    <label>Email</label>
                    <input type="email" name="email"  class="form-control" required>
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    <label>Data de Nascimento:</label>
                    <input type="date" name="data_nasc" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Cadastre-se" class="submit">
                </div>
            </form>
        </div>
    </body>
</html>
