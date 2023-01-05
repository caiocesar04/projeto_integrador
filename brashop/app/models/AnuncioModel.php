<?php
class AnuncioModel{
	private $id;
	private $nome;
	private $preco;
	private $imagem;
	private $categoria_id;

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
	
	public function getCategoria_id(){
		return $this->categoria_id;
	}
	
	public function setCategoria_id(int $categoria_id){
		$this->categoria_id = $categoria_id;
	}	
	
}