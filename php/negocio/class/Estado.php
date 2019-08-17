<?php
class Estado
{
    // declaração de propriedade
	private $id;
	private $nome;
	private $uf;
	
	// Geters and Seters
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}
	
	public function getUf(){
		return $this->uf;
	}

}