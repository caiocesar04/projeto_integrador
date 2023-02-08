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
        <h3> Mensagem</h3>
        <input type="text" name="mensagem" peacholoader="mensagem">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<style>
	footer{
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #009c3b;
    color: white;
    text-align: center;
}
footer p{
	margin-top: 1vh;
	margin-bottom: 1vh;
}
	</style>
	
  <footer>
	<p> Copyright © 2022-2023 Brahop LTDA. / CNPJ: 12.345.678/0009-10 / CEP: 85860-000 / Endereço: Av. Araucária, 780 - Vila A, Foz do Iguaçu - PR</p>
</footer>