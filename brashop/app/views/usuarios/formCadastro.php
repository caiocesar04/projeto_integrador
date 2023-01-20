<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devide-widthm initial-scale=1.0">
    <link rel="stylesheet" href="../views/helpers/styles.css">
    <title>Brashop</title>
</head>    
<?php include_once __DIR__ . "/../helpers/mensagem.php";?>
<body >
<form action="./UsuarioController.php?action=create" method="POST">  
<div class="main-login">
    <div class="left-login">
    <a href="./UsuarioController.php?action=loadHome" class="left-login-image">
           <img src="../../imagens/brashop.png" class="left-login-image" alt="imagem">
        </a>
    </div>  
    <div class="right-login">
        <div class="card-login">
            <h1>Cadastre-se</h1>
            <div class="textfield">
                <label for="usuario">Insira seu nome</label>
                <input type="text" name="nome" class="form-control"  placeholder="Nome" required>
            </div>
            <div class="textfield">
                <label for="usuario">Insira seu e-mail</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>
                <div class="textfield">
                <label for="usuario">Insira sua senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
            </div>
            <div class="textfield">
                <label>Data de Nascimento:</label>
                <input type="date" name="data_nasc" class="form-control" required>
             </div>
             <div class="textfield">
                <label>Foto de perfil:</label>
                <input type="file" name="foto_perfil" class="form-control" >
             </div>
            <button class="btn-login">Cadastre-se</button>
        </div>
    </div>
</div>
</form>
</body>
</html>
