<?php


require_once __DIR__ . "/../repository/SugestaoRepository.php";
 
$controllersugestao = new ControllerSugestao();

class ControllerSugestao{
  
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
        $sugestao = new SugestaoModel();
		$sugestao->setTexto($_POST["texto"]);
		$sugestaoRepository = new SugestaoRepository();
        $id = $sugestaoRepository->create($sugestao);
        //var_dump($id);

        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function findAll(string $msg = null){
       @session_start();
        $sugestaoRepository = new SugestaoRepository();

        $sugestoes = $sugestaoRepository->findAll();

        $data['titulo'] = "listar sugestoes";
        $data['sugestoes'] = $sugestoes;

         
        if(isset($_SESSION["usuario"])){
            $this->loadView("sugestoes/list.php", $data, $msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }
    private function findSugestaoByUser(){
        
        $nomeParam = @$_GET['usuarios_id'];
        $sugestaoRepository = new SugestaoRepository();
        $sugestoes = $sugestaoRepository->findSugestaoByUser($nomeParam);
        $data['titulo'] = "listar anuncios";
        $data['sugestoes'] = $sugestoes;
        
        if(isset($_SESSION["usuario"])){
            $this->loadView("sugestoes/minhasSugestoes.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
        
    }

    private function findSugestaoById(){
        $idParam = $_GET['id'];

        $sugestaoRepository = new SugestaoRepository();
        $sugestao = $sugestaoRepository->findSugestaoById($idParam);

        print "<pre>";
        print_r($sugestao);
        print "</pre>";
    }
    private function deleteSugestaoById(){
        $idParam = $_GET['id'];
        $sugestaoRepository = new SugestaoRepository();    

        $qt = $sugestaoRepository->deleteSugestaoById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        session_start();

        $idParam = $_GET['id'];
        $sugestaoRepository = new SugestaoRepository(); 
        $sugestao = $sugestaoRepository->findSugestaoById($idParam);
        $data['sugestoes'][0] = $sugestao;

       
        if(isset($_SESSION["usuario"])){
            $this->loadView("sugestoes/formEdita.php", $data);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
          }
        
    }

    private function update(){
        $sugestao = new SugestaoModel();

		$sugestao->setId($_GET["id"]);
        $sugestao->setTexto($_POST["texto"]);

        $sugestaoRepository = new SugestaoRepository();
        //print_r($usuario);
        $atualizou = $sugestaoRepository->update($sugestao);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
            $this->findAll(@$data, $msg);
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
            $this->loadView("sugestoes/formEdita.php", $data, $msg);
		}
        
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }


    private function loadFormNew(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->loadView("sugestoes/formCadastro.php", null);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
          }
       
    }    

    private function loadHome(){
        $this->loadView("usuarios/home.php", null);
    }    
}