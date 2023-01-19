<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/UsuarioModel.php";

    class UsuarioRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }




        
        public function create(UsuarioModel $usuario) : int {
            try {
                //print_r($usuario);
                $query = "INSERT INTO usuarios (nome, senha, email, data_nasc, foto_perfil) VALUES (:nome, :senha, :email, :data_nasc, :foto_perfil)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nome", $usuario->getNome());
                $prepare->bindValue(":senha", $usuario->getSenha());
                $prepare->bindValue(":email", $usuario->getEmail());
                $prepare->bindValue(":data_nasc", $usuario->getData_nasc());
                $prepare->bindValue(":foto_perfil", $usuario->getFoto_perfil());
                $prepare->execute();
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    //print("Erro ao inserir usuario no banco de dados");
                    return 0;
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM usuarios");
            $usuarios  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }
 


        public function findUsuarioById(int $id) {
            $query = "SELECT * FROM usuarios WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }
            return $usuario;
        }

        public function findUsuariorByIdLogged(): array {
            @session_start();
            $query = "SELECT * FROM usuarios WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(':id',@$_SESSION["usuario"]["id"]);
            $prepare->execute();
            $result = $prepare->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }
    

        public function update(UsuarioModel $usuario) : bool {
            $query = "UPDATE usuarios SET nome = ?, senha = ?, email = ?, data_nasc = 
            ?, foto_perfil = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $usuario->getNome());
            $prepare->bindValue(2, $usuario->getSenha());
            $prepare->bindValue(3, $usuario->getEmail());
            $prepare->bindValue(4, $usuario->getData_nasc());
            $prepare->bindValue(5, $usuario->getFoto_Perfil());
            $prepare->bindValue(6, $usuario->getId());
            $result = $prepare->execute();
            return $result;
        }

        public function deleteUsuarioById( int $id) : int {
            session_start();
            $query = "DELETE FROM usuarios WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
           
            if(isset($_SESSION["usuario"])){
                return $result;
              }else{
                $msg = "É necessário estar Logado!";
                $this->loadView("usuarios/formLogin.php", $data, $msg);
              }
            
        }
        
        public function login(UsuarioModel $usuario){
            

            $query = "SELECT * FROM usuarios WHERE  email = :email AND senha = :senha";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":email", $usuario->getEmail());
            $prepare->bindValue(":senha", $usuario->getSenha());
            // $prepare->execute();
            // $result = $prepare->rowCount();

            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }
           
            return $usuario ;
        }
        public function logout(UsuarioModel $usuario){
            session_start();
            unset($_SESSION["usuario"]);
            session_destroy();
        }

        public function ValidateEmail($email){
          if(filter_var($email, filter:FILTER_VALIDATE_EMAIL)){
            return true;
          }
          else{
            $this->setErro(erro:"email inválido");
            return false;
          }
        }
    }