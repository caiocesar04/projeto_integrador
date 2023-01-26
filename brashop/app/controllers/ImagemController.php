<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once __DIR__ . "/../repository/ImagemRepository.php";
//require_once __DIR__ . "/Controller.php";

$controllerImagem = new ControllerImagem();

class ControllerImagem{

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

        $imagem = new ImagemModel();
		$imagem->setPath($_POST["path"]);

        if(isset($_FILES["path"])){
            $arquivo = $_FILES["path"];

            if($arquivo["error"])
            die("Falha ao enviar arquivo!");

            if($_FILES["size"] > 2097152)
            die("Arquivo muito grande!! Max: 2MB");
             
            $pasta = "imgs/";
            $nomeArquivo = $arquivo["name"];
            $novoNomeArquivo = uniqid();
            $extensao =  pathinfo($nomeArquivo, PATHINFO_EXTENSION);
            $extensao = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != "png" ) 
                die("tipo de arquivo não aceito!");

            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta.$novoNomeArquivo.".".$extensao);

            if($deu_certo)
            echo "<p>Arquivo enviado com sucesso! Clique aqui para acessa-lo <a target='_blank' href='imgs/$nomeNovoArquivo.$extensao'> Clique aqui</a></p>";
            else
                echo "<p> falha ao enviar arquivo </p>";
         }
        $imagemRepository = new ImagemRepository();
        $id = $imagemRepository->create($imagem);

        $this->findAll();
		
        
    }


    private function findAll(string $msg = null){
            @session_start();


        if(!isset($_SESSION["usuarios"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
    
           

        $imagemRepository = new ImagemRepository();

        $usuarios = $imagemRepository->findAll();

        $data['titulo'] = "listar imagens";
        $data['imagens'] = $imagens;
        
        return $this->loadView("imagem/list.php", @$data);
    
       
}

    public function loadFormNew(){
        @session_start();

        if((@$_SESSION["usuario"])){
            $this->loadView("imagem/formCadastro.php", @$data, @$msg);;
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
    }




   

    private function deleteImagemById(){
        @session_start();
        if(!isset($_SESSION["usuarios"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          if(isset($_SESSION["usuarios"])){
            if($_SESSION["usuarios"]['id'] != $_GET['usuarios_id']){
                return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
            }
          }
          
        $idParam = $_GET['id'];
        $imagemRepository = new ImagemRepository();    

        $qt = $imagemRepository->deleteImagemById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}

    }


    private function edit(){
        session_start();

        $idParam = $_GET['id'];
        $imagemRepository = new ImagemRepository(); 
        $imagem = $imagemRepository->findImagemById($idParam);
        $data['imagens'][0] = $imagem;

        if(isset($_SESSION["usuario"])){
            $this->loadView("imagem/formEdita.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
    }

    private function update(){
        $imagem = new ImagemModel();

		$imagem->setId($_GET["id"]);
		$imagem->setPat($_POST["path"]);

        $imagemRepository = new ImagemRepository();
        //print_r($imagem);
        $atualizou = $imagemRepository->update($imagem);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->loadView("imagem/list.php");        
    }


    private function preventDefault() {
        print "Ação indefinida...";
    }
}
