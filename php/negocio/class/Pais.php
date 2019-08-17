<?php
class Pais
{
    // declaração de propriedade
	private $id;
	private $nome;
	private $sigla;
	
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

	public function setSigla($sigla){
		$this->sigla = $sigla;
	}
	
	public function getSigla(){
		return $this->sigla;
	}

}
