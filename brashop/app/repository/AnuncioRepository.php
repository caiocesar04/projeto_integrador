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
                $query = "INSERT INTO anuncios (nome, preco, imagem, descricao, usuarios_id, categorias_id) VALUES (:nome, :preco, :imagem, :descricao, :usuarios_id, :categoria_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $anuncio->getNome());
                $prepare->bindValue(":preco",$anuncio->getPreco());
                $prepare->bindValue(":imagem",$anuncio->getImagem());
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
            session_start();
            $query = "SELECT * FROM anuncios WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
 
        public function findAll(): array {
            $table = $this->conn->query("SELECT a.id, a.nome, a.preco, a.imagem, a.descricao,u.nome as 'usuario_nome' FROM `anuncios` a, usuarios u WHERE a.usuarios_id = u.id");
            $anuncios  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $anuncios;
        }
 



        public function findAnuncioById(int $id) {
            $query = "SELECT * FROM anuncios WHERE id = ?";
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
            $query = "UPDATE anuncios SET nome = ?, preco = ?, imagem = ? descricao = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $anuncio->getNome());
            $prepare->bindValue(2, $anuncio->getPreco());
            $prepare->bindValue(3, $anuncio->getImagem());
            $prepare->bindValue(4, $anuncio->getDescricao());
            $prepare->bindValue(5, $anuncio->getId());
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
            $query = "SELECT a.id, a.nome, a.preco, a.imagem, a.descricao, u.nome as 'usuario_nome' FROM `anuncios` a, usuarios u WHERE a.usuarios_id = u.id AND a.nome like :nome";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':nome','%'.$nome.'%', PDO::PARAM_STR);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }

    }