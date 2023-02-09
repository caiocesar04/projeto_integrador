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
            <form enctype="multipart/form-data"  action="./AnuncioController.php?action=create" method="POST">
                <div class="card-header">
                    <h2 style="color:white; text-align:cente;" >Anuncie um Produto</h2>
                </div>
                <div >
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">Nome:</label>
		 <input  style="color:white; background-color:black; width:50%; margin-left:25%;" type="text" name="nome" class="form-control" required>
                    </div>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">Preço:</label>
		 <input  style="color:white; background-color:black; width:50%; margin-left:25%;" type="number" name="preco" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                    name="null" class="form-control" required>
                    </div>
                    <label style="color:white; background-color:black; width:50%; margin-left:25%;" for="categoria_id">Categoria:</label>
                   
                    <select style="color:white; background-color:black; width:50%; margin-left:25%;" name="categoria_id" id="categoria_id" >
                        <option value="">Selecionar</option>
                    <?php
                    foreach ($data['categorias'] as $key => $categoria) {
                        echo '<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';
                    }
                    ?>
                    </select>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">imagem :</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="file" name="imagem" class="form-control" required>
                    </div>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">imagem 2:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;"  type="file" name="imagem2" class="form-control" required>
                    </div>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">imagem 3:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;"  type="file" name="imagem3" class="form-control" required>
                    </div>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">imagem 4:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;"  type="file" name="imagem4" class="form-control" required>
                    </div>
                    <div >
                    <label style="color:white; width:50%; margin-left:25%;">imagem 5:</label>
		 <input style="color:white; background-color:black; width:50%; margin-left:25%;"  type="file" name="imagem5" class="form-control" required>
                    </div>
                    <label style="color:white; width:50%; margin-left:25%;">Descricao:</label>
		            <input style="color:white; background-color:black; width:50%; margin-left:25%;" type="text" name="descricao" class="form-control" required>
                    </div>

                </div>
                <div >
                <button style="width:50%; margin-left:25%;" type="submit" value="enviar" name="enviar" class="btn btn-outline-success  my-2 my-sm-0-success my-2 my-sm-0">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
