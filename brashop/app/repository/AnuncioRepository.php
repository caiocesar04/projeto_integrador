<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/AnuncioModel.php";

    class AnuncioRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create(AnuncioModel $anuncio) : int {
            try {
                session_start();
                // print_r("anuncioooo");
                // print_r($anuncio);
                $query = "INSERT INTO anuncios (nome, preco, imagem, usuarios_id) VALUES (:nome, :preco, :imagem, :usuarios_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $anuncio->getNome());
                $prepare->bindValue(":preco",$anuncio->getPreco());
                $prepare->bindValue(":imagem",$anuncio->getImagem());
                //print_r($_SESSION["usuario"]["id"]);
                //die;
                $prepare->bindValue(":usuarios_id",$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuario no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM anuncios");
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
            $query = "UPDATE anuncios SET nome = ?, preco = ?, imagem = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $anuncio->getNome());
            $prepare->bindValue(2, $anuncio->getPreco());
            $prepare->bindValue(3, $anuncio->getImagem());
            $prepare->bindValue(4, $anuncio->getId());
            $result = $prepare->execute();
            return $result;
        }

        public function deleteAnuncioById( int $id) : int {
            $query = "DELETE FROM anuncios WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
       public function findAnuncioByName(string $nome){
            $query = "SELECT * FROM anuncios WHERE nome like :nome";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':nome','%'.$nome.'%', PDO::PARAM_STR);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }

    }