<?php
class ChatModel{
	private $id;
	private $mensagem;

	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	

	public function getMensagem(): string{
		return $this->mensagem;
	}
	
	public function setMensagem(string $men){
		$this->mensagem = $men;
	}
}