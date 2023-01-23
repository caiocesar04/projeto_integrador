<?php
require_once __DIR__ . "/../repository/AvaliacaoRepository.php";
$controlleravaliacao = new ControllerAvaliacao();
class ControllerAvaliacao{
  
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

    private function create(){

        @session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          

        $avaliacao = new AvaliacaoModel();
        $avaliacao->setNota($_POST["nota"]);
		$avaliacaoRepository = new AvaliacaoRepository();
        
        $id = $avaliacaoRepository->create($avaliacao, $_POST['anuncios_id']);
        
        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}
        $this->findAvaliacaoByUser($msg);
    }

    private function findAvaliacaoByUser(){
        
        
        $nomeParam = @$_GET['usuarios_id'];
        $avaliacaoRepository = new AvaliacaoRepository();
        $avaliacoes = $avaliacaoRepository->findAvaliacaoByUser($nomeParam);
        $data['titulo'] = "listar anuncios";
        $data['avaliacoes'] = $avaliacoes;
        
        if(isset($_SESSION["usuario"])){
            $this->loadView("avaliacoes/minhasAvaliacoes.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }

    private function findAll(string $msg = null){
        @session_start();
        $avaliacaoRepository = new AvaliacaoRepository();

        $avaliacoes = $avaliacaoRepository->findAll();

        $data['titulo'] = "listar anuncios";
        $data['avaliacoes'] = $avaliacoes;

        $this->loadView("avaliacoes/list.php", $data, $msg);
    }

    private function findAvaliacaoById(){
        $idParam = $_GET['id'];

        $avaliacaoRepository = new AvaliacaoRepository();
        $avaliacao = $avaliacaoRepository->findAvaliacaoById($idParam);

        print "<pre>";
        print_r($avaliacao);
        print "</pre>";
    }
    
    private function deleteAvaliacaoById(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
        $idParam = $_GET['id'];
        $avaliacaoRepository = new AvaliacaoRepository();    

        $qt = $avaliacaoRepository->deleteAvaliacaoById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAvaliacaoByUser($msg);
    }

    private function edit(){
        session_start();
        $idParam = $_GET['id'];
        $avaliacaoRepository = new AvaliacaoRepository(); 
        $avaliacoes = $avaliacaoRepository->findAvaliacaoById($idParam);
        $data['avaliacoes'][0] = $avaliacoes;
      
        if(isset($_SESSION["usuario"])){
            $this->loadView("avaliacoes/formEdita.php", $data);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
       
    }

    private function update(){
        $avaliacao = new AvaliacaoModel();

		$avaliacao->setId($_GET["id"]);
		$avaliacao->setNota($_POST["nota"]);
        $avaliacaoRepository = new AvaliacaoRepository();
        //print_r($usuario);
        $atualizou = $avaliacaoRepository->update($avaliacao);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
            $this->findAvaliacaoByAnuncio(@$data, $msg);
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
            $this->loadView("avaliacoes/formEdita.php", @$data, $msg);
		}
        
    }
    private function preventDefault() {
        print "Ação indefinida...";
    }


    private function loadFormNew(){
        session_start();

        if((@$_SESSION["usuario"])){
            $this->loadView("avaliacoes/formCadastro.php", @$data, @$msg);;
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
}
 
}