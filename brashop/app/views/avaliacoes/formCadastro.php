<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../views/helpers/css/bootstrap.min.css">
        <link rel="stylesheet" href="../views/helpers/style.css">
        <title> Brashop</title>
    </head>
    <body >
    <?php
	include_once __DIR__ . "/../helpers/menuLogin.php"; 
?>

        <div id="title">
            <form class="card col-md-10 mx-auto col-lg-5 p-4 p-md-5" action="./AvaliacaoController.php?action=create" method="POST">
                <div class="card-header">
                    <h2>Avaliar</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                    <label>Comentario</label>
                    <input type="text" name="comentario" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Nota</label>
                    <input type="number" name="nota" pattern="[0-9]+([,\.][0-9]+)?" min="0" max="5" step="any"
name="null" class="form-control" required>
                    </div>


                </div>
                <div class="card-footer">
                <button type="submit" value="enviar" name="enviar" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
