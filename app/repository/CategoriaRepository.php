<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/CategoriaModel.php";

    class CategoriaRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create(CategoriaModel $categoria) : int {
            try {
                $query = "INSERT INTO categorias (nome) VALUES (:nome)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $categoria->getNome());
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuario no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM categorias");
            $categorias  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $categorias;
        }
 


        public function findCategoriaById(int $id) {
            $query = "SELECT * FROM categorias WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $categoria  = $prepare->fetchObject("CategoriaModel");
            } else {
                $categoria = null;
            }
            return $categoria;
        }

        public function update(CategoriaModel $categoria) : bool {
            $query = "UPDATE categorias SET nome = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $categoria->getNome());
            $prepare->bindValue(2, $categoria->getId());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }


        public function deleteCategoriaById( int $id) : int {
            $query = "DELETE FROM categorias WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
        
        public function findCategoriaByName(string $nome){
            $query = "SELECT * FROM categorias WHERE nome like :nome";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':nome','%'.$nome.'%', PDO::PARAM_STR);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
        
        }

   