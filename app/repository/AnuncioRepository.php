<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/AnuncioModel.php";

    class AnuncioRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create( $anuncio) : int {
            try {
                session_start();
                $query = "INSERT INTO anuncios (nome, preco, imagem, imagem2, imagem3, imagem4, imagem5, descricao, usuarios_id, categorias_id) VALUES (:nome, :preco, :imagem, :imagem2, :imagem3, :imagem4, :imagem5, :descricao, :usuarios_id, :categoria_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $anuncio->getNome());
                $prepare->bindValue(":preco",$anuncio->getPreco());
                $prepare->bindValue(":imagem",$anuncio->getImagem());
                $prepare->bindValue(":imagem2",$anuncio->getImagem2());
                $prepare->bindValue(":imagem3",$anuncio->getImagem3());
                $prepare->bindValue(":imagem4",$anuncio->getImagem4());
                $prepare->bindValue(":imagem5",$anuncio->getImagem5());
                $prepare->bindValue(":descricao",$anuncio->getDescricao());
                $prepare->bindValue(":categoria_id", $_POST['categoria_id']);
                $prepare->bindValue(":usuarios_id",$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuario no banco de dados");
            }
        }

        public function findAnuncioByUser(): array {
            @session_start();
            $query = "SELECT * FROM anuncios WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
        public function findAnuncioByCategoria(): array {
            @session_start();
            $query = "SELECT usuarios_id, a.id, a.nome, a.preco, a.imagem, a.descricao,u.nome as 'usuario_nome' FROM `anuncios` a, usuarios u  WHERE a.usuarios_id = u.id AND categorias_id = :categoria_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':categoria_id',@$_POST["categoria_id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
 
        public function findAll(): array {
            $table = $this->conn->query("SELECT usuarios_id, a.id, a.nome, a.preco, a.imagem, a.descricao,u.nome as 'usuario_nome' FROM `anuncios` a, usuarios u WHERE a.usuarios_id = u.id");
            $anuncios  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $anuncios;
        }
 



        public function findAnuncioById(int $id) {
            $query = "SELECT anuncios.*, AVG(avaliacoes.nota) nota FROM anuncios, avaliacoes WHERE anuncios.id = ? AND avaliacoes.anuncios_id = anuncios.id;";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $anuncio  = $prepare->fetchObject("AnuncioModel");
            } else {
                $anuncio = null;
            }
            return $anuncio;
        }


        
        public function update(AnuncioModel $anuncio) : bool {
            $query = "UPDATE anuncios SET nome = ?, preco = ?, imagem = ?, imagem2 = ?, imagem3 = ?, imagem4 = ?, imagem5 = ?, descricao = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $anuncio->getNome());
            $prepare->bindValue(2, $anuncio->getPreco());
            $prepare->bindValue(3, $anuncio->getImagem());
            $prepare->bindValue(4, $anuncio->getImagem2());
            $prepare->bindValue(5, $anuncio->getImagem3());
            $prepare->bindValue(6, $anuncio->getImagem4());
            $prepare->bindValue(7, $anuncio->getImagem5());
            $prepare->bindValue(8, $anuncio->getDescricao());
            $prepare->bindValue(9, $anuncio->getId());
            $result = $prepare->execute();
            return $result;
        }

        public function deleteAnuncioById( int $id) : int {
            $query = "DELETE FROM anuncios WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            return $result;
        }

        
       public function findAnuncioByName(string $nome){
            $query = "SELECT  usuarios_id, a.id, a.nome, a.preco, a.imagem, a.descricao, u.nome as 'usuario_nome' FROM `anuncios` a, usuarios u WHERE a.usuarios_id = u.id AND a.nome like :nome";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':nome','%'.$nome.'%', PDO::PARAM_STR);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            
            if ($result){
            }
            else{
                echo "<h2><font color='white'> Não econtramos resultados para sua pesquisa!</font></h2>";
            }
            return $result;
        }

        public function findAnuncioByUserClick($usuario_id): array {
            @session_start();
            $query = "SELECT * FROM anuncios WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',$usuario_id);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;

            return $anuncios;
        }

    }