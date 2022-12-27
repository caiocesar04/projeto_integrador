<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/SugestaoModel.php";

    class SugestaoRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create(SugestaoModel $sugestao) : int {
            try {
                session_start();
                $query = "INSERT INTO sugestoes (texto, usuarios_id) VALUES (:texto, :usuarios_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":texto", $sugestao->gettexto());
                $prepare->bindValue(":usuarios_id",$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuario no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM sugestoes");
            $sugestoes  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $sugestoes;
        }
 


        public function findSugestaoById(int $id) {
            $query = "SELECT * FROM sugestoes WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $sugestao  = $prepare->fetchObject("SugestaoModel");
            } else {
                $sugestao = null;
            }
            return $sugestao;
        }

        public function findSugestaoByUser(): array {
            session_start();
            $query = "SELECT * FROM sugestoes WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update(SugestaoModel $sugestao) : bool {

            $query = "UPDATE sugestoes SET texto = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $sugestao->gettexto());
            $prepare->bindValue(2, $sugestao->getId());
            $result = $prepare->execute();
            return $result;
        }


        public function deleteSugestaoById( int $id) : int {
        

            $query = "DELETE FROM sugestoes WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();

            return $result;
        }
    }