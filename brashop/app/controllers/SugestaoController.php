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
        $sugestaoRepository = new SugestaoRepository();

        $sugestoes = $sugestaoRepository->findAll();

        $data['titulo'] = "listar sugestoes";
        $data['sugestoes'] = $sugestoes;

        $this->loadView("sugestoes/list.php", $data, $msg);
    }

    private function findAnuncioById(){
        $idParam = $_GET['id'];

        $sugestaoRepository = new SugestaoRepository();
        $sugestao = $sugestaoRepository->findAnuncioById($idParam);

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
        $idParam = $_GET['id'];
        $sugestaoRepository= new SugestaoRepository(); 
        $sugestao = $sugestaoRepository->findSugestaoById($idParam);
        $data['sugestoes'][0] = $sugestao;

        $this->loadView("sugestoes/formEdita.php", $data);
    }

    private function update(){
        $sugestao = new SugestaoRepository();

		$sugestao->setId($_GET["id"]);
		$sugestao->setTexto($_POST["texto"]);
		
        $sugestaoRepository = new SugestaoRepository();
        
        $atualizou = $sugestaoRepository->update($sugestao);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}

        $this->findAll($msg);        
    }
  

    private function preventDefault() {
        print "Ação indefinida...";
    }


    private function loadFormNew(){
        $this->loadView("sugestoes/formCadastro.php", null,"teste");
    }    

    private function loadHome(){
        $this->loadView("usuarios/home.php", null,"teste");
    }    
}