<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devide-widthm initial-scale=1.0">
    <link rel="stylesheet" href="../views/helpers/styless.css">
    <title>Brashop</title>
</head>    
<?php include_once __DIR__ . "/../helpers/mensagem.php";?>
<body >
<form action="./UsuarioController.php?action=login" method="POST">  
<div class="main-login">
    <div class="left-login">
       <a href="./UsuarioController.php?action=loadHome" class="left-login-image">
           <img src="../../imagens/brashop.png" class="left-login-image" alt="imagem">
        </a>
    </div>  
    <div class="right-login">
        <div class="card-login">
            <h1>Login</h1>
            <div class="textfield">
                <label for="usuario">Insira seu e-mail</label>
                <input type="email" name="email" placeholder="E-mail">
            </div>
                <div class="textfield">
                <label for="usuario">Insira sua senha</label>
                <input type="password" name="senha" placeholder="Senha">
            </div>
            <button class="btn-login">Login</button>
        </div>
    </div>
</div>
</form>
</body>
</html>
