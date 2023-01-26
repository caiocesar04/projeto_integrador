<?php
class ImagemModel{
	private $id;
	private $path;
	
	

	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	

	public function getPath(): string{
		return $this->path;
	}
	
	public function setPath(string $pat){
		$this->path = $pat;
	}
	
}