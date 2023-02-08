<?php
class AnuncioModel{
	private $id;
	private $nome;
	private $preco;
	private $imagem;
	private $imagem2;
	private $imagem3;
	private $imagem4;
	private $imagem5;
	private $descricao;
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
	public function getImagem2(): string{
		return $this->imagem2;
	}
	
	public function setImagem2(string $img2){
		$this->imagem2 = $img2;
	}
	public function getImagem3(): string{
		return $this->imagem3;
	}
	
	public function setImagem3(string $img3){
		$this->imagem3 = $img3;
	}
	public function getImagem4(): string{
		return $this->imagem4;
	}
	
	public function setImagem4(string $img4){
		$this->imagem4 = $img4;
	}
	public function getImagem5(): string{
		return $this->imagem5;
	}
	
	public function setImagem5(string $img5){
		$this->imagem5 = $img5;
	}
	public function getDescricao(): string{
		return $this->descricao;
	}
	
	public function setDescricao(string $des){
		$this->descricao = $des;
	}
	
	public function getCategoria_id(){
		return $this->categoria_id;
	}
	
	public function setCategoria_id(int $categoria_id){
		$this->categoria_id = $categoria_id;
	}	
	
}