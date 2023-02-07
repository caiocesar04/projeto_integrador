<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/DenunciaModel.php";

    class DenunciaRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        
        public function createDenunciaAnuncio(DenunciaModel $denuncia, $anuncios_id) : int {
            try {
                @session_start();
                $query = "INSERT INTO denuncias (motivo, usuarios_id, anuncios_id) VALUES (:motivo, :usuarios_id, :anuncios_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":motivo", $denuncia->getMotivo());
                $prepare->bindValue(":anuncios_id", $anuncios_id);
                $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir denuncia no banco de dados");
            }
        }
        

        public function createDenunciaUsuario(DenunciaModel $denuncia, $usuario_denunciado_id) : int {
            try {
                @session_start();
                $query = "INSERT INTO denuncias (motivo, usuarios_id, usuario_denunciado_id) VALUES (:motivo, :usuarios_id, :usuario_denunciado_id)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":motivo", $denuncia->getMotivo());
                $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
                $prepare->bindValue(":usuario_denunciado_id", $usuario_denunciado_id);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir denuncia no banco de dados");
            }
        }


 
        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM denuncias");
            $denuncias  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $denuncias;
        }

        public function findDenunciaByUser(): array {
            @session_start();
            $query = "SELECT * FROM denuncias WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }



        public function findDenunciaById(int $id) {
            $query = "SELECT * FROM denuncias WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $denuncia  = $prepare->fetchObject("DenunciaModel");
            } else {
                $denuncia = null;
            }
            return $denuncia;
        }

        public function update(DenunciaModel $denuncia) : bool {
            $query = "UPDATE denuncias SET  motivo = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $denuncia->getMotivo());
            $prepare->bindValue(2, $denuncia->getId());
            $result = $prepare->execute();
            return $result;
        }

        public function deleteDenunciaById( int $id) : int {
            $query = "DELETE FROM denuncias WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            return $result;
        }

    }