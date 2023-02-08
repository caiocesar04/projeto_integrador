<?php
class UsuarioModel{
	private $id;
	private $nome;
	private $senha;
	private $email;
	private $data_nasc;
	private $foto_perfil;
	private $isadm;


	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	
	
	public function getNome(): string{
		return $this->nome;
	}
	
	public function setNome(string $n){
		$this->nome = $n;
	}

	public function getSenha(): string{
		return $this->senha;
	}
	
	public function setSenha(string $sen){
		$this->senha = $sen;
	}

	public function getEmail(): string{
		return $this->email;
	}
	
	public function setEmail(string $e){
		$this->email = $e;
	}
	public function getData_nasc(): string{
		return $this->data_nasc;
	}
	
	public function setData_nasc(string $dat){
		$this->data_nasc = $dat;
	}

	public function getFoto_perfil(): string{
		return $this->foto_perfil;
	}
	
	public function setFoto_Perfil(string $foto){
		$this->foto_perfil = $foto;
	}

	public function isAdm(): bool{
		return $this->isadm == 1;
	}
	public function Ban(): bool{
		return $this->ban == 1;
	}
	

	public function getAll(){
		return [
			"id" =>$this->id,
			"nome" =>$this->nome,
			"email" =>$this->email,
			"data_nasc" =>$this->data_nasc,
			"foto_perfil" =>$this->foto_perfil,
			"is_adm" => $this->isadm,
			"ban" => $this->isadm
		
		];
	}
}

