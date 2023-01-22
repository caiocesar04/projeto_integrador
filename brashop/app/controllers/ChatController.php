<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . "/../repository/ChatRepository.php";
//require_once __DIR__ . "/Controller.php";

$controllerchat = new ControllerChat();

class ControllerChat{

	function __construct(){
		if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}
		//print_r($action);

		if(isset($action)){
			$this->callAction($action);
		}else{
			$msg = "Nenhuma acao a ser processada...";
            print_r($msg);
			//include_once "index.php";
		}
	}

    public function callAction(string $functionName = null){
        //print_r($functionName);
        if (method_exists($this, $functionName)) {
            $this->$functionName();
        
        } else if(method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public function loadView(string $path, array $data = null, string $msg = null){
        $caminho = __DIR__ . "/../views/" . $path;
        // echo("msg=");
        // print_r($msg);
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function create(){
        $chat = new chatModel();
       
        
		$chat->setMensagem($_POST["mensagem"]);
        $usuarioRepository = new ChatRepository();
        $id = $usuarioRepository->create($chat, $_POST["destinatario_id"]);
        //var_dump($id);


            $this->loadFormNew();    
    }

    private function findAll(string $msg = null){
       
        $chatRepository = new ChatRepository();

        $chats = $chatRepository->findAll();

        $data['titulo'] = "listar chat";
        $data['chat'] = $chats;
        @session_start();
        if(isset($_SESSION["usuario"])){
            $this->loadView("usuarios/chat.php", $data, $msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }

    private function findChatById(){
        $idParam = $_GET['id'];

        $chatRepository = new ChatRepository();
        $chat = $chatRepository->findChatById($idParam);

        print "<pre>";
        print_r($chat);
        print "</pre>";
    }

    private function findUsuarioByClick(){
        session_start();
           $idParam = $_GET['id'];
           $chatRepository = new ChatRepository(); 
           $chats = $chatRepository->findChatById($idParam);
           $data['titulo'] = "listar chats";
           $data['chat'] = $chats;
         
           $this->loadView("usuarios/chat.php", $data);
       } 

    private function findMensagemByUser(string $msg = null){
       
        $nomeParam = @$_GET['usuarios_id'];
        $chatRepository = new ChatRepository();
        $chats = $chatRepository->findMensagemByUser($nomeParam);
        $data['titulo'] = "listar chats";
        $data['chat'] = $chats;
        
        if(isset($_SESSION["usuario"])){
            $this->loadView("usuarios/chat.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }

    private function loadFormNew(){
        @session_start();
        $chatRepository = new ChatRepository();
        $chats = $chatRepository->getConversa($_GET["id"]);
        if((@$_SESSION["usuario"])){
            $this->loadView("usuarios/chat.php",["chats"=>$chats]);
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
}

    private function preventDefault() {
        print "Ação indefinida...";
    }
}
