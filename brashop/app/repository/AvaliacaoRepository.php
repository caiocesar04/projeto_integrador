<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/AvaliacaoModel.php";

    class AvaliacaoRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create(AvaliacaoModel $avaliacao) : int {
            try {
                session_start();
                $query = "INSERT INTO avaliacoes (comentario, nota, usuarios_id) VALUES (:comentario, :nota, :usuarios_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":comentario", $avaliacao->getComentario());
                $prepare->bindValue(":nota", $avaliacao->getNota());
                $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuario no banco de dados");
            }
        }

 
        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM avaliacoes");
            $avaliacoes  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $avaliacoes;
        }

        public function findAvaliacaoByUser(): array {
            session_start();
            $query = "SELECT * FROM avaliacoes WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }



        public function findAvaliacaoById(int $id) {
            $query = "SELECT * FROM avaliacoes WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $avaliacao  = $prepare->fetchObject("AvaliacaoModel");
            } else {
                $avaliacao = null;
            }
            return $avaliacao;
        }

        public function update(AvaliacaoModel $avaliacao) : bool {
            $query = "UPDATE avaliacoes SET comentario = ?, nota = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $avaliacao->getComentario());
            $prepare->bindValue(2, $avaliacao->getNota());
            $prepare->bindValue(3, $avaliacao->getId());
            $result = $prepare->execute();
            return $result;
        }

        public function deleteAvaliacaoById( int $id) : int {
            $query = "DELETE FROM avaliacoes WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            return $result;
        }

    }