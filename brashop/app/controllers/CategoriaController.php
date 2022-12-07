<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . "/../repository/CategoriaRepository.php";
//require_once __DIR__ . "/Controller.php";

$controllercategoria = new ControllerCategoria();

class ControllerCategoria{
  
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
        $categoria = new CategoriaModel();
		$categoria->setNome($_POST["nome"]);
        
		$categoriaRepository = new CategoriaRepository();
        $id = $categoriaRepository->create($categoria);
        //var_dump($id);

        if($id > 0){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }
    
    private function findCategoriaById(){
        $idParam = $_GET['id'];

        $categoriaRepository = new CategoriaRepository();
        $categoria = $categoriaRepository->findCategoriaById($idParam);

        print "<pre>";
        print_r($categoria);
        print "</pre>";
    }

    private function findAll(string $msg = null){

        $categoriaRepository = new CategoriaRepository();

        $categorias = $categoriaRepository->findAll();

        $data['titulo'] = "listar categorias";
        $data['categorias'] = $categorias;
        
        $this->loadView("categorias/list.php", $data, $msg);
    }

    private function SelecionarCategoria(string $msg = null){
        $categoriaRepository = new CategoriaRepository();

        $categorias = $categoriaRepository->findAll();

        $data['titulo'] = "listar categorias";
        $data['categorias'] = $categorias;

       
    }

    private function deleteCategoriaById(){
        $idParam = $_GET['id'];
        $categoriaRepository = new CategoriaRepository();    

        $qt = $categoriaRepository->deleteCategoriaById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $categoriaRepository = new CategoriaRepository(); 
        $categoria = $categoriaRepository->findCategoriaById($idParam);
        $data['categorias'][0] = $categoria;

        $this->loadView("categorias/formEdita.php", $data);
    }

    private function update(){
        $categoria = new CategoriaModel();

		$categoria->setId($_GET["id"]);
		$categoria->setNome($_POST["nome"]);

        $categoriaRepository = new CategoriaRepository();
        $atualizou = $categoriaRepository->update($categoria);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->findAll($msg);        
    }
    private function loadFormNew(){
        $this->loadView("categorias/formCadastro.php", null);
    }    

    private function loadHome(){
        $this->loadView("usuarios/home.php", null);
    }    

    private function preventDefault() {
        print "Ação indefinida...";
    }
}