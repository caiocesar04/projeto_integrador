<?php

    class SugestaoModel{
	private $id;
	private $texto;
	

    public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	
	
	public function getTexto(): string{
		return $this->texto;
	}
	
	public function setTexto(string $tex){
		$this->texto = $tex;
	}



}