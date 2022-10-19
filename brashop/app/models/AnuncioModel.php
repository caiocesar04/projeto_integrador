<?php
class AnuncioModel{
	private $id;
	private $nome;
	private $preco;
	

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

	public function getPreco(): string{
		return $this->senha;
	}
	
	public function setPreco(string $sen){
		$this->senha = $sen;
	}

	