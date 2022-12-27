<?php
class AvaliacaoModel{
	private $id;
	private $comentario;
	private $nota;
	
	

	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	
	
	public function getComentario(): string{
		return $this->comentario;
	}
	
	public function setComentario(string $com){
		$this->comentario = $com;
	}

	public function getNota(): float{
		return $this->nota;
	}
	
	public function setNota(float $not){
		$this->nota = $not;
	}
	
}