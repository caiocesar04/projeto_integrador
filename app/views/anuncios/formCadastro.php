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
            <form enctype="multipart/form-data" class="card col-md-10 mx-auto col-lg-5 p-4 p-md-5" action="./AnuncioController.php?action=create" method="POST">
                <div class="card-header">
                    <h2>Anuncie um Produto</h2>
                </div>
                <div class="card-content">
                    <div class="card-content-area">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Preço</label>
                    <input type="number" name="preco" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                    name="null" class="form-control" required>
                    </div>
                    <label for="categoria_id">Categoria:</label>
                   
                    <select name="categoria_id" id="categoria_id" >
                        <option value="">Selecionar</option>
                    <?php
                    foreach ($data['categorias'] as $key => $categoria) {
                        echo '<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';
                    }
                    ?>
                    </select>
                    <div class="card-content-area">
                    <label>Imagem</label>
                    <input type="file" name="imagem" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Imagem 2:</label>
                    <input type="file" name="imagem2" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Imagem 3:</label>
                    <input type="file" name="imagem3" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Imagem 4:</label>
                    <input type="file" name="imagem4" class="form-control" required>
                    </div>
                    <div class="card-content-area">
                    <label>Imagem 5:</label>
                    <input type="file" name="imagem5" class="form-control" required>
                    </div>
                    <label>Descrição</label>
                    <input type="text" name="descricao" class="form-control" required>
                    </div>

                </div>
                <div class="card-footer">
                <button type="submit" value="enviar" name="enviar" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
