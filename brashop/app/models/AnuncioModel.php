<?php
class AnuncioModel{
	private $id;
	private $nome;
	private $preco;
	private $imagem;


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

	public function getPreco(): float{
		return $this->preco;
	}
	
	public function setPreco(float $pre){
		$this->preco = $pre;
	}

	public function getImagem(): string{
		return $this->imagem;
	}
	
	public function setImagem(string $img){
		$this->imagem = $img;
	}
	
}
