<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/ChatModel.php";

    class ChatRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }


        public function create(ChatModel $chat) : int {
            try {
                
                $query = "INSERT INTO chat (nome, mensagem) VALUES (:nome, :mensagem)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $chat->getNome());
                $prepare->bindValue(":mensagem",$chat->getMensagem());
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

}