<?php
require_once __DIR__ . "/../repository/DenunciaRepository.php";
$controllerdenuncia = new ControllerDenuncia();
class ControllerDenuncia{
  
    function __construct(){
		if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}
		//print_r("--->".$action);

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

    private function createDenunciaAnuncio(){

        @session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          

        $denuncia = new DenunciaModel();
        $denuncia->setMotivo($_POST["motivo"]);
		$denunciaRepository = new DenunciaRepository();
        
        $id = $denunciaRepository->createDenunciaAnuncio($denuncia, $_POST['anuncios_id']);
        
        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}
        $this->findDenunciaByUser($msg);
    }

    private function createDenunciaUsuario(){

        @session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          

        $denuncia = new DenunciaModel();
        $denuncia->setMotivo($_POST["motivo"]);
		$denunciaRepository = new DenunciaRepository();
        
        $id = $denunciaRepository->createDenunciaUsuario($denuncia, $_POST['usuario_denunciado_id']);
        
        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}
        $this->findDenunciaByUser($msg);
    }

    private function findDenunciaByUser(){
        
        
        $nomeParam = @$_GET['usuarios_id'];
        $denunciaRepository = new DenunciaRepository();
        $denuncias = $denunciaRepository->findDenunciaByUser($nomeParam);
        $data['titulo'] = "listar denuncias";
        $data['denuncias'] = $denuncias;
        
        if(isset($_SESSION["usuario"])){
            $this->loadView("denuncias/minhasDenuncias.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }

    private function findAll(string $msg = null){
        @session_start();
        $denunciaRepository = new DenunciaRepository();

        $denuncias = $denunciaRepository->findAll();

        $data['titulo'] = "listar anuncios";
        $data['denuncias'] = $denuncias;

        $this->loadView("denuncias/list.php", $data, $msg);
    }

    private function findDenunciaById(){
        $idParam = $_GET['id'];

        $denunciaRepository = new DenunciaRepository();
        $denuncia = $denunciaRepository->findDenunciaById($idParam);

        print "<pre>";
        print_r($denuncia);
        print "</pre>";
    }
    private function findDenunciaAnuncio(){
        session_start();
           $idParam = $_GET['anuncios_id'];
           $denunciaRepository = new UsuarioRepository(); 
           $denuncia = $denunciaRepository->findDenunciaById($idParam);
           $data['denuncias'] = $denuncia;
         
           $this->loadView("denuncias/list.php", $data);
       }
       private function findDenunciaUsuario(){
        session_start();
           $idParam = $_GET['usuario_denunciado_id'];
           $denunciaRepository = new UsuarioRepository(); 
           $denuncia = $denunciaRepository->findDenunciaById($idParam);
           $data['denuncias'] = $denuncia;
         
           $this->loadView("denuncias/list.php", $data);
       }
    private function deleteDenunciaById(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
        $idParam = $_GET['id'];
        $denunciaRepository = new DenunciaRepository();    

        $qt = $denunciaRepository->deleteDenunciaById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findDenunciaByUser($msg);
    }

    private function edit(){
        session_start();
        $idParam = $_GET['id'];
        $denunciaRepository = new DenunciaRepository(); 
        $denuncias = $denunciaRepository->findDenunciaById($idParam);
        $data['denuncias'][0] = $denuncias;
      
        if(isset($_SESSION["usuario"])){
            $this->loadView("denuncias/formEdita.php", $data);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
       
    }

    private function update(){
        $denuncia = new DenunciaModel();

		$denuncia->setId($_GET["id"]);
		$denuncia->setMotivo($_POST["motivo"]);
        $denunciaRepository = new DenunciaRepository();
        //print_r($usuario);
        $atualizou = $denunciaRepository->update($denuncia);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
            $this->findAvaliacaoByAnuncio(@$data, $msg);
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
            $this->loadView("denuncias/formEdita.php", @$data, $msg);
		}
        
    }
    private function preventDefault() {
        print "Ação indefinida...";
    }


    private function loadFormNew(){
        session_start();

        if((@$_SESSION["usuario"])){
            $this->loadView("denuncias/formDenunciaAnuncio.php", @$data, @$msg);;
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
}
private function loadFormNew2(){
    session_start();

    if((@$_SESSION["usuario"])){
        $this->loadView("denuncias/formDenunciaUser.php", @$data, @$msg);;
    }else{
        $msg = "É necessário estar logado";
        $this->loadView("usuarios/formLogin.php", @$data, $msg);
    }
}
 
}