<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devide-widthm initial-scale=1.0">
    <link rel="stylesheet" href="../views/helpers/style-login.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Brashop</title>
</head>    
<?php include_once __DIR__ . "/../helpers/mensagem.php";?>
<body>
<form enctype="multipart/form-data" action="./UsuarioController.php?action=create" method="POST">
<div class="main-login">
    <div class="left-login">
        <a href="./UsuarioController.php?action=loadHome" class="left-login-image">
           <img src="../../imgs/brashop.png" class="left-login-image" alt="imagem">
        </a>
    </div>
    <div class="cont-contactBtn">
        <div class="cont-flip">
            <div class="front">
                <div class="right-login">
                    <div class="card-login">
                        <h1>Cadastre-se</h1>
                            <div class="textfield"><label for="usuario">Insira seu e-mail</label><input type="email" name="email" class="form-control" placeholder="E-mail" required></div>
                            <div class="textfield"><label for="usuario">Insira sua senha</label><input type="password"   name="senha" class="form-control" placeholder="Senha" required></div>
                            <div class="textfield"><label for="usuario">Confirme sua Senha</label><input type="password" name="confirmar_senha" class="form-control" placeholder="Senha" required></div>
                            <div class ="textfield"><label><input type="checkbox" required><a>Termos de Uso (Obrigatório)</a><a style = "color: white;" href="https://docs.google.com/document/d/1tOZpVVdvuIhEC8rYDoAqA9qb1JGSicMKmcnq89RjVfE/edit?usp=sharing">Leia mais</a></label></div>    
                            <button class="btn-login flip">Continuar</button>
                    </div>
                </div>
            </div>
            <div class="back">
                <div class="right-login">
                    <div class="card-login">
                        <h1>Cadastre-se</h1>
                        <button class="flip close"> ⇽ </button>
                        <div class="textfield"><label for="usuario">Nome de exbição</label><input type="text" name="nome" class="form-control"  placeholder="Nome" required></div>
                        <div class="textfield"><label>Data de Nascimento:</label><input type="date" name="data_nasc" class="form-control" required></div>
                        <div class="textfield"><label>CPF:</label><input type="text" name="CPF" minlength="11" maxlength="11" placeholder="000.000.000-00" class="form-control" required></div>
                        <button class="btn-login">Cadastre-se</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<script>
$(document).ready(function(){
$('.flip').click(function(){
$('.cont-flip').toggleClass('flipped');
return false;
});
});
</script>
</form>
</body>
</html>
