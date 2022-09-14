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
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
    <h1> Usuarios</h1>
    <ul>
        <?php foreach($data['usuarios'] as $user):
        
            print "<table class = 'table table-hover-table-striped table-bordered'>";
                print "<tr>";
                print "<th>#</th>";
                print "<th>Nome</th>";
                print "<th>Senha</th>";
                print "<th>Email</th>";
                print "<th>Data de Nascimento</th>";
                print "</tr>";
            
                
            
            print "<td>".$user['id']."</td>";
             print "<td>".$user['nome']."</td>";
                 print "<td>".$user['senha']."</td>";
                 print "<td>".$user['email']."</td>";
                 print "<td>".$user['data_nasc']."</td>" ;?>
                [ <a href="./UsuarioController.php?action=edit&id=<?= $user['id'] ?>">Editar</a> ] 
                [ <a href="javascript:confirmarExclusaoUsuario('<?= $user['nome'] ?>', <?= $user['id'] ?>)">Excluir</a> ]
                       
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./UsuarioController.php?action=loadFormNew">Cadastrar novo usuario</a> ]
    
</body>
</html>