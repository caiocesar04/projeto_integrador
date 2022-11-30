<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../views/helpers/css/bootstrap.min.css">
    <script src="../views/helpers/funcao.js" type="text/javascript"></script>

</head>
<body>
    <div id='chat'> 

    </div> 
    <form method="post" action="./ChatController.php?action=create">
    <h3> Nome</h3>
        <input type="text" name="nome" peacholoader="Nome">
        <h3> Mensagem</h3>
        <input type="text" name="mensagem" peacholoader="mensagem"> 
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
