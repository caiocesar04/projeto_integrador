<?php
require_once __DIR__ . "/../repository/AnuncioRepository.php";
$controlleranuncio = new ControllerAnuncio();
class ControllerAnuncio{
  
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
        $anuncio = new AnuncioModel();
		$anuncio->setNome($_POST["nome"]);
        $anuncio->setPreco($_POST["preco"]);
        $anuncio->setImagem($_POST["imagem"]);
        

		$anuncioRepository = new AnuncioRepository();
        $id = $anuncioRepository->create($anuncio);
        //var_dump($id);

        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function findAll(string $msg = null){
        $anuncioRepository = new AnuncioRepository();

        $anuncios = $anuncioRepository->findAll();

        $data['titulo'] = "listar anuncios";
        $data['anuncios'] = $anuncios;

        $this->loadView("anuncios/list.php", $data, $msg);
    }

    private function findAnuncioById(){
        $idParam = $_GET['id'];

        $anuncioRepository = new AnuncioRepository();
        $anuncio = $anuncioRepository->findAnuncioById($idParam);

        print "<pre>";
        print_r($anuncio);
        print "</pre>";
    }
    private function findAnuncioByUser(){
        $nomeParam = @$_GET['usuarios_id'];
        $anuncioRepository = new AnuncioRepository();
        $anuncios = $anuncioRepository->findAnuncioByUser($nomeParam);
        $data['titulo'] = "listar anuncios";
        $data['anuncios'] = $anuncios;
        $this->loadView("anuncios/listAnuncios.php", $data, @$msg);
    }

    
    private function findAnuncioByName(){
        $nomeParam = $_POST['nome'];
        $anuncioRepository = new AnuncioRepository();
        $anuncios = $anuncioRepository->findAnuncioByName($nomeParam);
        $data['titulo'] = "listar anuncios";
        $data['anuncios'] = $anuncios;
        $this->loadView("anuncios/search.php", $data, @$msg);
    }
    private function deleteAnuncioById(){
        $idParam = $_GET['id'];
        $anuncioRepository = new AnuncioRepository();    

        $qt = $anuncioRepository->deleteAnuncioById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $anuncioRepository = new AnuncioRepository(); 
        $anuncio = $anuncioRepository->findAnuncioById($idParam);
        $data['anuncios'][0] = $anuncio;

        $this->loadView("anuncios/formEdita.php", $data);
    }

    private function update(){
        $anuncio = new AnuncioModel();

		$anuncio->setId($_GET["id"]);
		$anuncio->setNome($_POST["nome"]);
		$anuncio->setPreco($_POST["preco"]);
        $anuncio->setImagem($_POST["imagem"]);
        $anuncioRepository = new AnuncioRepository();
        //print_r($usuario);
        $atualizou = $anuncioRepository->update($anuncio);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
            $this->findAll(@$data, $msg);
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
            $this->loadView("anuncios/formEdita.php", @$data, $msg);
		}
        
    }
    private function preventDefault() {
        print "Ação indefinida...";
    }


    private function loadFormNew(){
        session_start();

        if((@$_SESSION["usuario"])){
            $this->loadView("anuncios/formCadastro.php", @$data, @$msg);;
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
}

    private function loadHome(){
        $this->loadView("usuarios/home.php", null);
    }    
}