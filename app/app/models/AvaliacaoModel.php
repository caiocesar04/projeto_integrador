<?php
class AvaliacaoModel{
	private $id;
	private $nota;
	
	

	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	

	public function getNota(): float{
		return $this->nota;
	}
	
	public function setNota(float $not){
		$this->nota = $not;
	}
	
}