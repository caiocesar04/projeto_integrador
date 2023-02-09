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

        if($_POST["senha"] != $_POST["confirmar_senha"] ){
            echo "<script>alert('As senhas não condizem!');</script>";
            return $this->loadView("usuarios/formCadastro.php", @$data);
         
        }

        $usuario = new usuarioModel();
        // $usuario->setNome("aaa");
        // $usuario->setSenha("123213");
        // $usuario->setEmail("asd@asd");
        // $usuario->setData_nasc("asd@asd");

		$usuario->setNome($_POST["nome"]);
		$usuario->setSenha(md5($_POST["senha"]));
		$usuario->setEmail($_POST["email"]);
        $usuario->setData_nasc($_POST["data_nasc"]);
        $usuario->setCPF($_POST["CPF"]);
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
    private function editfotoPerfil(){
        session_start();

        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository(); 
        $usuario = $usuarioRepository->findUsuarioById($idParam);
        $data['usuarios'][0] = $usuario;

        if(isset($_SESSION["usuario"])){
            $this->loadView("usuarios/formFotoPerfil.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
    }
    private function InsertFotoPerfil(){

        $usuario = new usuarioModel();
        $usuario->setId($_GET["id"]);

        if(isset($_FILES["foto_perfil"])){
            $arquivo = $_FILES["foto_perfil"];

            if($arquivo["error"])
            die("Falha ao enviar arquivo!");

            if($arquivo["size"] > 2097152)
            die("Arquivo muito grande!! Max: 2MB");
             
            $pasta = "imgs/";
            $nomeArquivo = md5($arquivo["name"].time());
            $novoNomeArquivo = uniqid();
            $extensao = explode(".",$arquivo["name"]);
            $extensao = end($extensao);

            if ($extensao != "jpg" && $extensao != "png" ) 
                die("tipo de arquivo não aceito!");
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/brashop/imgs/".$novoNomeArquivo.".".$extensao);
            if($deu_certo){
            $usuario->setFoto_perfil($novoNomeArquivo.".".$extensao);
            
            }
         }
      
         $usuarioRepository = new UsuarioRepository();
         //print_r($usuario);
         $atualizou = $usuarioRepository->InsertFotoPerfil($usuario);
         
         if($atualizou){
             $msg = "Registro atualizado com sucesso.";
         }else{
             $msg = "Erro ao atualizar o registro no banco de dados.";
         }
 
         $this->findUsuarioByIdLogged($msg);        
     }
        
    

    private function InsertAdmByUserId(){
        session_start();
            if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
            }
            if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['is_adm'] == 0){
                $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
                 return $this->loadView("usuarios/formLogin.php", @$data, $msg);
            } 
            }  
            $usuario = new usuarioModel();
            $usuario->isAdm();
            $idParam = $_GET['id'];
            $usuarioRepository = new UsuarioRepository();    
    
            $qt = $usuarioRepository->InsertAdmByUserId($idParam);
            if($qt){
                $msg = "Registro excluído com sucesso.";
            }else{
                $msg = "Erro ao excluir o registro no banco de dados.";
            }
            if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['is_adm'] == 1){
                $this->findAll($msg);
            }
    }
}
private function RetirarFotoPerfil(){
    session_start();
        if(!isset($_SESSION["usuario"])){
            $msg = "É necessário estar logado!";
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
        }
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['id'] != $_GET["id"]){
            $msg = "Acesso restrito! Somente o dono desta conta tem direito a essa ação.";
             return $this->loadView("usuarios/formLogin.php", @$data, $msg);
        } 
        }  
        $usuario = new usuarioModel();
        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->RetirarFotoPerfil($idParam);
        if($qt){
            $msg = "Registro excluído com sucesso.";
        }else{
            $msg = "Erro ao excluir o registro no banco de dados.";
        }
        $this->findUsuarioByIdLogged($msg);
}


private function Banir(){
    session_start();
    if(!isset($_SESSION["usuario"])){
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
      }
      if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 0){
            $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
             return $this->loadView("usuarios/formLogin.php", @$data, $msg);
        } 
    }  

        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->Banir($idParam);
        if($qt){
            $msg = "Registro excluído com sucesso.";
        }else{
            $msg = "Erro ao excluir o registro no banco de dados.";
        }
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
            $this->findAll($msg);
        }
}
}
private function RetirarBanimento(){
    session_start();
    if(!isset($_SESSION["usuario"])){
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
      }
      if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 0){
            $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
             return $this->loadView("usuarios/formLogin.php", @$data, $msg);
        } 
    }  

        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->RetirarBanimento($idParam);
        if($qt){
            $msg = "Registro excluído com sucesso.";
        }else{
            $msg = "Erro ao excluir o registro no banco de dados.";
        }
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
            $this->findAll($msg);
        }
}
}

private function RetirarAdm(){
    session_start();
    if(!isset($_SESSION["usuario"])){
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
      }
      if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 0){
            $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
             return $this->loadView("usuarios/formLogin.php", @$data, $msg);
        } 
    }  

        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->RetirarAdm($idParam);
        if($qt){
            $msg = "Registro excluído com sucesso.";
        }else{
            $msg = "Erro ao excluir o registro no banco de dados.";
        }
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
            $this->findAll($msg);
        }
}
}

    private function loadFormNew(){
        $this->loadView("usuarios/formCadastro.php", null);
    }   
     private function loadFormDelete(){
         session_start();
        
        if(isset($_SESSION["usuario"])){
                if($_SESSION["usuario"]['id'] != $_GET['id']){
                    $msg = "Somente o dono da conta pode executar esta ação";
                    return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
                }else{
                return $this->loadView("usuarios/deleteUsuario.php", null);
                }
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
       
    }    

    private function loadHome(){
        $this->loadView("usuarios/home.php", null);
    }    
    private function loadAdm(){
        @session_start();
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
        $this->loadView("usuarios/homeAdm.php", null);
    }else{
            $msg = "É necessário o administrador estar Logado!";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
        }
        
        
    }
    }    

    private function loadLogin(){
        $this->loadView("usuarios/formLogin.php", null);
    } 
    private function loadRecuperar(){
        $this->loadView("usuarios/recuperarSenha.php", null);
    } 
    
    private function loadHomeLogin(){
        @session_start();
        
        if(isset($_SESSION["usuario"])){
            $this->loadView("usuarios/homeLogin.php", null);
		}else{
			$msg = "É necessário estar logado";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
		}
    }      
    

    private function findAll(string $msg = null){
            @session_start();


        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['is_adm'] == 0){
                $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
                 return $this->loadView("usuarios/formLogin.php", @$data, $msg);
            } 
            }

        

        $usuarioRepository = new UsuarioRepository();

        $usuarios = $usuarioRepository->findAll();

        $data['titulo'] = "listar usuarios";
        $data['usuarios'] = $usuarios;
        
        if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['is_adm'] == 1){
                return $this->loadView("usuarios/list.php", @$data);
            } 
            }
       
    }
    private function findAllUsuario(string $msg = null){
        @session_start();


    if(!isset($_SESSION["usuario"])){
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
      }

    

    $usuarioRepository = new UsuarioRepository();

    $usuarios = $usuarioRepository->findAllUsuario();

    $data['titulo'] = "listar usuarios";
    $data['usuarios'] = $usuarios;
    
    
            return $this->loadView("usuarios/OutrosUsuarios.php", @$data);
}

    private function findUsuarioBan(string $msg = null){
        @session_start();


    if(!isset($_SESSION["usuario"])){
        return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
      }
      if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 0){
            $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
             return $this->loadView("usuarios/formLogin.php", @$data, $msg);
        } 
        }

    

    $usuarioRepository = new UsuarioRepository();

    $usuarios = $usuarioRepository->findUsuarioBan();

    $data['titulo'] = "listar usuarios";
    $data['usuarios'] = $usuarios;
    
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
            return $this->loadView("usuarios/listBanidos.php", @$data);
        } 
        }
   
}
private function findAdm(string $msg = null){
    @session_start();


if(!isset($_SESSION["usuario"])){
    return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
  }
  if(isset($_SESSION["usuario"])){
    if($_SESSION["usuario"]['is_adm'] == 0){
        $msg = "Acesso restrito! Somente administradores tem direito a essa ação.";
         return $this->loadView("usuarios/formLogin.php", @$data, $msg);
    } 
    }



    $usuarioRepository = new UsuarioRepository();

    $usuarios = $usuarioRepository->findAdm();

    $data['titulo'] = "listar usuarios";
    $data['usuarios'] = $usuarios;

    if(isset($_SESSION["usuario"])){
    if($_SESSION["usuario"]['is_adm'] == 1){
        return $this->loadView("usuarios/listAdm.php", @$data);
    } 
    }

}
    private function findUsuarioById(){
        $idParam = $_GET['id'];

        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->findUsuarioById($idParam);

        print "<pre>";
        print_r($usuario);
        print "</pre>";
    }

    private function findUsuarioByClick(){
        session_start();
           $idParam = $_GET['id'];
           $usuarioRepository = new UsuarioRepository(); 
           $usuario = $usuarioRepository->findUsuarioById($idParam);
           $data['usuario'] = $usuario;
         
           $this->loadView("usuarios/UsuarioClicked.php", $data);
       }

     private function login(){
       

        $usuario = new usuarioModel();
		
		@$usuario->setSenha(md5($_POST["senha"]));
		@$usuario->setEmail($_POST["email"]);
        
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->login($usuario);

        
       

        
        if($usuario){
            @session_start();
            $_SESSION['usuario'] = $usuario->getAll();
            if($usuario->isAdm()){
               
                $this->loadView("usuarios/homeAdm.php",@$data);
            }
            elseif($usuario->Ban()){
               
                echo "Você está banido!";
                return $this->loadView("usuarios/FormLogin.php",@$data);
            }
            else{
               
                $this->loadView("usuarios/homeLogin.php",@$data);
                echo ("<h1><font> Bem Vindo  ".$usuario->getNome(@$_GET["nome"])."!</font>");
            }
            
		}else{
			$msg = "Erro ao Logar! verifique se seu email e senha estão corretos.";
            $this->loadView("usuarios/formLogin.php", @$data, $msg);
            exit;
		}     
    }

    private function Recuperar_Senha(){

        $email = $_POST["recuperar"];
        $emailenviar = $_POST["recuperar"];
        $destino = $emailenviar;
        $assunto = "Contato pelo Site";
      
        // É necessário indicar que o formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From:  <$email>';
        //$headers .= "Bcc: $EmailPadrao\r\n";
      
        $enviaremail = mail($destino, $assunto, $headers);
        if($enviaremail){
        $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
        echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo "";
        }
    }


    private function logout(){
        

        $usuario = new usuarioModel();
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->logout($usuario);
        $this->loadHome();
    }


    private function findUsuarioByIdLogged(){

        $nomeParam = @$_GET['id'];
        $usuarioRepository = new UsuarioRepository();
        $usuarios = $usuarioRepository->findUsuariorByIdLogged($nomeParam);
        $data['titulo'] = "listar usuarios";
        $data['usuarios'] = $usuarios;


        if(isset($_SESSION["usuario"])){
            $this->loadView("usuarios/dadosUsuario.php", $data, @$msg);
          }else{
            $msg = "É necessário estar Logado!";
            $this->loadView("usuarios/formLogin.php", $data, $msg);
          }
       
    }
    private function findUsuarioByName(){
        session_start();
       if(!isset($_SESSION["usuario"])){
                $msg = "É necessário o estar Logado!";
                return  $this->loadView("usuarios/formLogin.php", @$data, $msg);
            }
            if(isset($_SESSION["usuario"])){
                if($_SESSION["usuario"]['ban'] == 1){
               return  $this->loadView("usuarios/UsuarioClicked.php", @$data, $msg);
                }   
        $nomeParam = $_POST['nome'];
        $usuarioRepository = new UsuarioRepository();
        $usuarios = $usuarioRepository->findUsuarioByName($nomeParam);
        $data['titulo'] = "listar usuarios";
        $data['usuarios'] = $usuarios;
  
        if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['is_adm'] == 0){
           return  $this->loadView("usuarios/OutrosUsuarios.php", @$data, @$msg);
            } if($_SESSION["usuario"]['is_adm'] == 1){
            $this->loadView("usuarios/list.php", $data, @$msg);
            }
    }
    }
    }
    private function deleteUsuarioById(){
       // $usuario->setSenha($_POST["senha"]);
        @session_start();
        if(!isset($_SESSION["usuario"])){
            return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
          }
          if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['id'] != $_GET['id']){
                return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
            }
            if(@$_SESSION["usuario"]['senha'] != @$_POST['senha']){
                //echo "Senha incorreta!"
                //return $this->findUsuarioByIdLogged(@$data, @$msg);
            }
          }
          
        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository();    

        $qt = $usuarioRepository->deleteUsuarioById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]['is_adm'] == 1){
            $this->findAll($msg);
        }
        else{
        $this->loadFormNew($msg);
    }
    }
}

    private function edit(){
        session_start();

        if(isset($_SESSION["usuario"])){
            if($_SESSION["usuario"]['id'] != $_GET['id']){
                $msg = "Somente o dono da conta pode executar esta ação";
                return $this->loadView("usuarios/formLogin.php", @$data, @$msg);
            }
        }
        if(!isset($_SESSION["usuario"])){
            $msg = "É necessário estar Logado!";
           return $this->loadView("usuarios/formLogin.php", $data, $msg);
          
        }
        $idParam = $_GET['id'];
        $usuarioRepository = new UsuarioRepository(); 
        $usuario = $usuarioRepository->findUsuarioById($idParam);
        $data['usuarios'][0] = $usuario;

       
           return $this->loadView("usuarios/formEdita.php", $data, @$msg);
          
    }

    private function update(){
        $usuario = new UsuarioModel();

		$usuario->setId($_GET["id"]);
		$usuario->setNome($_POST["nome"]);
		$usuario->setSenha (md5($_POST["senha"]));
		$usuario->setEmail($_POST["email"]);
        $usuario->setData_nasc($_POST["data_nasc"]);

        if(isset($_FILES["foto_perfil"])){
            $arquivo = $_FILES["foto_perfil"];

            if($arquivo["error"])
            die("Falha ao enviar arquivo!");

            if($arquivo["size"] > 2097152)
            die("Arquivo muito grande!! Max: 2MB");
             
            $pasta = "imgs/";
            $nomeArquivo = md5($arquivo["name"].time());
            $novoNomeArquivo = uniqid();
            $extensao = explode(".",$arquivo["name"]);
            $extensao = end($extensao);

            if ($extensao != "jpg" && $extensao != "png" ) 
                die("tipo de arquivo não aceito!");
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/brashop/imgs/".$novoNomeArquivo.".".$extensao);
            if($deu_certo){
            $usuario->setFoto_perfil($novoNomeArquivo.".".$extensao);
            
            }
         }


        $usuarioRepository = new UsuarioRepository();
        //print_r($usuario);
        $atualizou = $usuarioRepository->update($usuario);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->findUsuarioByIdLogged($msg);        
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }
}
