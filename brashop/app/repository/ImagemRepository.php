<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/ImagemModel.php";

    class ImagemRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function create( $imagem) : int {
            try {
                @session_start();
                $query = "INSERT INTO imagens ('path', usuarios_id) VALUES (:arquivo, :usuarios_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":arquivo", $imagem->getPath());
                $prepare->bindValue(":usuarios_id",$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir arquivo no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM imagens");
            $imagens  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $imagens;
        }
    }