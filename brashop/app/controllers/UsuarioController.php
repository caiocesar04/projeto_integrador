<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UsuarioRepository.php";
//require_once __DIR__ . "/Controller.php";

$controllerusuario = new ControllerUsuario();

class ControllerUsuario{

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
        $usuario = new usuarioModel();
        // $usuario->setNome("aaa");
        // $usuario->setSenha("123213");
        // $usuario->setEmail("asd@asd");
        // $usuario->setData_nasc("asd@asd");

		$usuario->setNome($_POST["nome"]);
		$usuario->setSenha($_POST["senha"]);
		$usuario->setEmail($_POST["email"]);
        $usuario->setData_nasc($_POST["data_nasc"]);
        $usuarioRepository = new UsuarioRepository();
        $id = $usuarioRepository->create($usuario);
        //var_dump($id);

      
        if($id > 0){
			$msg = "Registro inserido com sucesso. Agora é só Logar!";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}else{
			$msg = "Erro ao inserir registro! É provavel que este email já exista!";
            $this->loadView("usuarios/formCadastro.php", @$data, $msg);
		}
        
    }

    private function loadFormNew(){
        $this->loadView("usuarios/formCadastro.php", null);
    }    

    private function loadHome(){
        $this->loadView("usuarios/home.php", null);
    }    
    private function loadAdm(){
        $this->loadView("usuarios/homeAdm.php", null);
    }    
    private function loadLogin(){
        $this->loadView("usuarios/formLogin.php", null);
    }  
    private function loadHomeLogin(){
        $this->loadView("usuarios/homeLogin.php", null);
    }  
    

    private function findAll(string $msg = null){
        $usuarioRepository = new UsuarioRepository();

        $usuarios = $usuarioRepository->findAll();

        $data['titulo'] = "listar usuarios";
        $data['usuarios'] = $usuarios;

        $this->loadView("usuarios/list.php", $data, $msg);
    }

    private function findUsuarioById(){
        $idParam = $_GET['id'];

        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->findUsuarioById($idParam);

        print "<pre>";
        print_r($usuario);
        print "</pre>";
    }
    
     private function login(){
       

        $usuario = new usuarioModel();
		
		@$usuario->setSenha($_POST["senha"]);
		@$usuario->setEmail($_POST["email"]);
        
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->login($usuario);
 
        
        if($usuario){
            $this->loadView("usuarios/homeLogin.php", @$data);
            session_start();
            $_SESSION['usuario'] = $usuario->getAll();
             echo ("<h1><font color='white'> Bem Vindo  ".$usuario->getNome(@$_GET["nome"])."!</font>");
		}else{
			$msg = "Erro ao Logar! verifique se seu email e senha estão corretos.";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
            exit;
		}     
    }

    private function logout(){

        $usuario = new usuarioModel();
        $this->loadHome();
    }

    private function deleteUsuarioById(){
        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->deleteUsuarioById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository(); 
        $usuario = $usuarioRepository->findUsuarioById($idParam);
        $data['usuarios'][0] = $usuario;

        $this->loadView("usuarios/formEdita.php", $data);
    }

    private function update(){
        $usuario = new UsuarioModel();

		$usuario->setId($_GET["id"]);
		$usuario->setNome($_POST["nome"]);
		$usuario->setSenha($_POST["senha"]);
		$usuario->setEmail($_POST["email"]);
        $usuario->setData_nasc($_POST["data_nasc"]);

        $usuarioRepository = new UsuarioRepository();
        //print_r($usuario);
        $atualizou = $usuarioRepository->update($usuario);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->findAll($msg);        
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }
}
