<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/ChatModel.php";

    class ChatRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }


        public function create(ChatModel $chat, $destinatario_id) : int {
            try {
                session_start();
                $query = "INSERT INTO chat (mensagem, usuarios_id, usuario2_id ) VALUES   (:mensagem, :usuarios_id, :destinatario)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":mensagem",$chat->getMensagem());
                $prepare->bindValue(":destinatario",$destinatario_id);
                $prepare->bindValue(":usuarios_id",$_SESSION["usuario"]["id"]);
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir mensagem no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM chat");
            $chats  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $chats;
        }

        public function findChatById(int $id) {
            $query = "SELECT * FROM chat WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }
            return $usuario;
        }
        

        public function findMensagemByUser(): array {
            @session_start();
            $query = "SELECT * FROM chat WHERE usuarios_id = :usuarios_id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getConversa($destinatario_id){
            @session_start();
            $query = " SELECT c.id, c.mensagem, (SELECT nome FROM usuarios WHERE id = c.usuarios_id) remetente, (SELECT nome FROM usuarios WHERE id = c.usuario2_id) destinatario FROM chat c WHERE usuarios_id IN (:usuarios_id, :destinatario) AND usuario2_id IN (:usuarios_id, :destinatario)";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':destinatario',$destinatario_id);
            $prepare->bindValue(':usuarios_id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;

        }
}