<?php
class DenunciaModel{
	private $id;
	private $motivo;
	
	

	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	

	public function getMotivo(): string{
		return $this->motivo;
	}
	
	public function setMotivo(string $mot){
		$this->motivo = $mot;
	}
	
}